<?php
namespace App\Http\Controllers;
use App\Models\Guru; use Illuminate\Http\Request; use Illuminate\Validation\Rule;
class GuruController extends Controller {
 public function index(){ $gurus=Guru::latest()->get(); return view('guru.index',compact('gurus')); }
 public function create(){ return view('guru.create'); }
 public function store(Request $request){ $data=$request->validate(['nip'=>'required|string|max:255|unique:gurus,nip','nama'=>'required|string|max:255','jenis_kelamin'=>'required|in:L,P','email'=>'nullable|email|max:255','no_hp'=>'nullable|string|max:30','alamat'=>'nullable|string']); Guru::create($data); return redirect()->route('guru.index')->with('success','Data guru berhasil ditambahkan.'); }
 public function edit(Guru $guru){ $item=$guru; return view('guru.edit',compact('guru','item')); }
 public function update(Request $request,Guru $guru){ $data=$request->validate(['nip'=>['required','string','max:255',Rule::unique('gurus','nip')->ignore($guru->id)],'nama'=>'required|string|max:255','jenis_kelamin'=>'required|in:L,P','email'=>'nullable|email|max:255','no_hp'=>'nullable|string|max:30','alamat'=>'nullable|string']); $guru->update($data); return redirect()->route('guru.index')->with('success','Data guru berhasil diperbarui.'); }
 public function destroy(Guru $guru){ $guru->delete(); return redirect()->route('guru.index')->with('success','Data guru berhasil dihapus.'); }
}