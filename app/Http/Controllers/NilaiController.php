<?php
namespace App\Http\Controllers;
use App\Models\Mapel; use App\Models\Nilai; use App\Models\Siswa; use Illuminate\Http\Request; use Illuminate\Validation\Rule;
class NilaiController extends Controller {
 public function index(){ $nilais=Nilai::with(['siswa.kelas','mapel'])->latest()->get(); return view('nilai.index',compact('nilais')); }
 public function create(){ $siswas=Siswa::orderBy('nama')->get(); $mapels=Mapel::orderBy('nama_mapel')->get(); return view('nilai.create',compact('siswas','mapels')); }
 private function validated(Request $request, ?Nilai $nilai=null): array { $data=$request->validate(['siswa_id'=>['required','exists:siswas,id',Rule::unique('nilais','siswa_id')->where(fn($q)=>$q->where('mapel_id',$request->mapel_id))->ignore($nilai?->id)],'mapel_id'=>'required|exists:mapels,id','nilai_tugas'=>'required|numeric|min:0|max:100','nilai_uts'=>'required|numeric|min:0|max:100','nilai_uas'=>'required|numeric|min:0|max:100']); $mapel=Mapel::findOrFail($data['mapel_id']); $akhir=round($data['nilai_tugas']*.3+$data['nilai_uts']*.3+$data['nilai_uas']*.4,2); return $data+['nilai_akhir'=>$akhir,'keterangan'=>$akhir >= $mapel->kkm ? 'Lulus':'Tidak Lulus']; }
 public function store(Request $request){ Nilai::create($this->validated($request)); return redirect()->route('nilai.index')->with('success','Nilai siswa berhasil disimpan.'); }
 public function edit(Nilai $nilai){ $siswas=Siswa::orderBy('nama')->get(); $mapels=Mapel::orderBy('nama_mapel')->get(); $item=$nilai; return view('nilai.edit',compact('nilai','siswas','mapels','item'));  }
 public function update(Request $request,Nilai $nilai){ $nilai->update($this->validated($request,$nilai)); return redirect()->route('nilai.index')->with('success','Nilai siswa berhasil diperbarui.'); }
 public function destroy(Nilai $nilai){ $nilai->delete(); return redirect()->route('nilai.index')->with('success','Data nilai berhasil dihapus.'); }
}