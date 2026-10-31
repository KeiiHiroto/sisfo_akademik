<?php
namespace App\Http\Controllers;
use App\Models\Mapel; use Illuminate\Http\Request;
class MapelController extends Controller {
 public function index(){ $mapels=Mapel::withCount('nilais')->latest()->get(); return view('mapel.index',compact('mapels')); }
 public function create(){ return view('mapel.create'); }
 public function store(Request $request){ $data=$request->validate(['kode_mapel'=>'required|string|max:255|unique:mapels,kode_mapel','nama_mapel'=>'required|string|max:255','kkm'=>'required|integer|min:0|max:100']); Mapel::create($data); return redirect()->route('mapel.index')->with('success','Mata pelajaran berhasil ditambahkan.'); }
 public function edit(Mapel $mapel){ $item=$mapel; return view('mapel.edit',compact('mapel','item')); }
 public function update(Request $request,Mapel $mapel){ $data=$request->validate(['kode_mapel'=>'required|string|max:255|unique:mapels,kode_mapel,'.$mapel->id,'nama_mapel'=>'required|string|max:255','kkm'=>'required|integer|min:0|max:100']); $mapel->update($data); return redirect()->route('mapel.index')->with('success','Mata pelajaran berhasil diperbarui.'); }
 public function destroy(Mapel $mapel){ if($mapel->nilais()->exists()) return back()->with('error','Mata pelajaran masih digunakan pada data nilai.'); $mapel->delete(); return redirect()->route('mapel.index')->with('success','Mata pelajaran berhasil dihapus.'); }
}