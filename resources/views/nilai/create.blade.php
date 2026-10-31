@extends('layouts.main')
@section('title', 'Input Nilai Siswa')
@section('content')
<div class="container-fluid">
 <h1 class="h3 mb-4 text-gray-800">Input Nilai Siswa</h1>
 <div class="card shadow mb-4"><div class="card-body">
  @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('nilai.store') }}" method="POST">@csrf
    <div class="form-group"><label for="siswa_id">Siswa</label>
   <select class="form-control" id="siswa_id" name="siswa_id" required><option value="">Pilih siswa</option>@foreach($siswas as $siswa)<option value="{{ $siswa->id }}" {{ old('siswa_id', isset($item) ? $item->siswa_id : '') == $siswa->id ? 'selected' : '' }}>{{ $siswa->nama }} ({{ $siswa->nis }})</option>@endforeach</select>
  </div>
  <div class="form-group"><label for="mapel_id">Mata Pelajaran</label>
   <select class="form-control" id="mapel_id" name="mapel_id" required><option value="">Pilih mata pelajaran</option>@foreach($mapels as $mapel)<option value="{{ $mapel->id }}" {{ old('mapel_id', isset($item) ? $item->mapel_id : '') == $mapel->id ? 'selected' : '' }}>{{ $mapel->nama_mapel }} (KKM {{ $mapel->kkm }})</option>@endforeach</select>
  </div>
  <div class="form-group"><label for="nilai_tugas">Nilai Tugas (30%)</label>
   <input class="form-control" type="number" id="nilai_tugas" name="nilai_tugas" value="{{ old('nilai_tugas', isset($item) ? $item->nilai_tugas : '') }}" required min="0" max="100" step="0.01">
  </div>
  <div class="form-group"><label for="nilai_uts">Nilai UTS (30%)</label>
   <input class="form-control" type="number" id="nilai_uts" name="nilai_uts" value="{{ old('nilai_uts', isset($item) ? $item->nilai_uts : '') }}" required min="0" max="100" step="0.01">
  </div>
  <div class="form-group"><label for="nilai_uas">Nilai UAS (40%)</label>
   <input class="form-control" type="number" id="nilai_uas" name="nilai_uas" value="{{ old('nilai_uas', isset($item) ? $item->nilai_uas : '') }}" required min="0" max="100" step="0.01">
  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
  <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Batal</a>
  </form>
 </div></div>
</div>
@endsection
