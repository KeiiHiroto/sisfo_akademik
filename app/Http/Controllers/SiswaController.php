<?php
namespace App\Http\Controllers;
use App\Models\Kelas; use App\Models\Siswa; use Illuminate\Http\Request; use Illuminate\Validation\Rule;
class SiswaController extends Controller {
 public function index(){ $siswas=Siswa::with('kelas')->latest()->get(); return view('siswa.index',compact('siswas')); }
 public function create(){ $kelas=Kelas::orderBy('nama_kelas')->get(); return view('siswa.create',compact('kelas')); }
 public function store(Request $request){ $data=$request->validate(['nis'=>'required|string|max:255|unique:siswas,nis','nama'=>'required|string|max:255','jenis_kelamin'=>'required|in:L,P','alamat'=>'nullable|string','no_hp'=>'nullable|string|max:30','kelas_id'=>'required|exists:kelas,id']); Siswa::create($data); return redirect()->route('siswa.index')->with('success','Data siswa berhasil ditambahkan.'); }
 public function show(Siswa $siswa){ $siswa->load(['kelas','nilais.mapel']); return view('siswa.show',compact('siswa')); }
 public function edit(Siswa $siswa){ $kelas=Kelas::orderBy('nama_kelas')->get(); $item=$siswa; return view('siswa.edit',compact('siswa','kelas','item'));  }
 public function update(Request $request,Siswa $siswa){ $data=$request->validate(['nis'=>['required','string','max:255',Rule::unique('siswas','nis')->ignore($siswa->id)],'nama'=>'required|string|max:255','jenis_kelamin'=>'required|in:L,P','alamat'=>'nullable|string','no_hp'=>'nullable|string|max:30','kelas_id'=>'required|exists:kelas,id']); $siswa->update($data); return redirect()->route('siswa.index')->with('success','Data siswa berhasil diperbarui.'); }
 public function destroy(Siswa $siswa){ $siswa->delete(); return redirect()->route('siswa.index')->with('success','Data siswa berhasil dihapus.'); }
}