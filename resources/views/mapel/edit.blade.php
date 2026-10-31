@extends('layouts.main')
@section('title', 'Edit Mata Pelajaran')
@section('content')
<div class="container-fluid">
 <h1 class="h3 mb-4 text-gray-800">Edit Mata Pelajaran</h1>
 <div class="card shadow mb-4"><div class="card-body">
  @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">@csrf
  @method('PUT')
  <div class="form-group"><label for="kode_mapel">Kode Mapel</label>
   <input class="form-control" type="text" id="kode_mapel" name="kode_mapel" value="{{ old('kode_mapel', isset($item) ? $item->kode_mapel : '') }}" required>
  </div>
  <div class="form-group"><label for="nama_mapel">Nama Mata Pelajaran</label>
   <input class="form-control" type="text" id="nama_mapel" name="nama_mapel" value="{{ old('nama_mapel', isset($item) ? $item->nama_mapel : '') }}" required>
  </div>
  <div class="form-group"><label for="kkm">KKM Minimum</label>
   <input class="form-control" type="number" id="kkm" name="kkm" value="{{ old('kkm', isset($item) ? $item->kkm : '') }}" required min="0" max="100" step="0.01">
  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
  <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
  </form>
 </div></div>
</div>
@endsection
