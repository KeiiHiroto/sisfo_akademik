@extends('layouts.main')
@section('title', 'Tambah Data Kelas')
@section('content')
<div class="container-fluid">
 <h1 class="h3 mb-4 text-gray-800">Tambah Data Kelas</h1>
 <div class="card shadow mb-4"><div class="card-body">
  @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('kelas.store') }}" method="POST">@csrf
    <div class="form-group"><label for="nama_kelas">Nama Kelas</label>
   <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas', isset($item) ? $item->nama_kelas : '') }}" required>
  </div>
  <div class="form-group"><label for="tingkat">Tingkat (X / XI / XII)</label>
   <input class="form-control" type="text" id="tingkat" name="tingkat" value="{{ old('tingkat', isset($item) ? $item->tingkat : '') }}" required>
  </div>
  <div class="form-group"><label for="jurusan">Jurusan</label>
   <input class="form-control" type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', isset($item) ? $item->jurusan : '') }}" required>
  </div>
  <div class="form-group"><label for="tahun_ajaran">Tahun Ajaran</label>
   <input class="form-control" type="text" id="tahun_ajaran" name="tahun_ajaran" value="{{ old('tahun_ajaran', isset($item) ? $item->tahun_ajaran : '') }}" required>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
  <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
  </form>
 </div></div>
</div>
@endsection
