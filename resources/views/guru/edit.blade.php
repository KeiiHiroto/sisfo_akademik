@extends('layouts.main')
@section('title', 'Edit Data Guru')
@section('content')
<div class="container-fluid">
 <h1 class="h3 mb-4 text-gray-800">Edit Data Guru</h1>
 <div class="card shadow mb-4"><div class="card-body">
  @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('guru.update', $guru->id) }}" method="POST">@csrf
  @method('PUT')
  <div class="form-group"><label for="nip">NIP</label>
   <input class="form-control" type="text" id="nip" name="nip" value="{{ old('nip', isset($item) ? $item->nip : '') }}" required>
  </div>
  <div class="form-group"><label for="nama">Nama Guru</label>
   <input class="form-control" type="text" id="nama" name="nama" value="{{ old('nama', isset($item) ? $item->nama : '') }}" required>
  </div>
  <div class="form-group"><label for="jenis_kelamin">Jenis Kelamin</label>
   <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required><option value="">Pilih jenis kelamin</option><option value="L" {{ old('jenis_kelamin', isset($item) ? $item->jenis_kelamin : '') == 'L' ? 'selected' : '' }}>Laki-Laki</option><option value="P" {{ old('jenis_kelamin', isset($item) ? $item->jenis_kelamin : '') == 'P' ? 'selected' : '' }}>Perempuan</option></select>
  </div>
  <div class="form-group"><label for="email">Email</label>
   <input class="form-control" type="email" id="email" name="email" value="{{ old('email', isset($item) ? $item->email : '') }}" >
  </div>
  <div class="form-group"><label for="no_hp">Nomor HP</label>
   <input class="form-control" type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', isset($item) ? $item->no_hp : '') }}" >
  </div>
  <div class="form-group"><label for="alamat">Alamat</label>
   <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', isset($item) ? $item->alamat : '') }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
  <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
  </form>
 </div></div>
</div>
@endsection
