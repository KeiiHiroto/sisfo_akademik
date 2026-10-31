<?php
namespace App\Http\Controllers;
use App\Models\Kelas; use Illuminate\Http\Request;
class KelasController extends Controller {
 public function index(){ $kelas=Kelas::withCount('siswas')->latest()->get(); return view('kelas.index',compact('kelas')); }
 public function create(){ return view('kelas.create'); }
 public function store(Request $request){ $data=$request->validate(['nama_kelas'=>'required|string|max:255|unique:kelas,nama_kelas','tingkat'=>'required|string|max:10','jurusan'=>'required|string|max:255','tahun_ajaran'=>'required|string|max:20']); Kelas::create($data); return redirect()->route('kelas.index')->with('success','Data kelas berhasil ditambahkan.'); }
 public function edit(Kelas $kela){ $kelas=$kela; $item=$kela; $kelas=$kela; return view('kelas.edit',compact('kelas','item')); }
 public function update(Request $request,Kelas $kela){ $data=$request->validate(['nama_kelas'=>'required|string|max:255|unique:kelas,nama_kelas,'.$kela->id,'tingkat'=>'required|string|max:10','jurusan'=>'required|string|max:255','tahun_ajaran'=>'required|string|max:20']); $kela->update($data); return redirect()->route('kelas.index')->with('success','Data kelas berhasil diperbarui.'); }
 public function destroy(Kelas $kela){ if($kela->siswas()->exists()) return back()->with('error','Kelas tidak dapat dihapus karena masih memiliki siswa.'); $kela->delete(); return redirect()->route('kelas.index')->with('success','Data kelas berhasil dihapus.'); }
}