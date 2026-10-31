@extends('layouts.main')
@section('title', 'Data Guru')
@section('content')
<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4"><h1 class="h3 mb-0 text-gray-800">Data Guru</h1><a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm mr-1"></i>Tambah Guru</a></div>
 <div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Data Guru</h6></div><div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped table-hover"><thead class="bg-primary text-white"><tr><th>No</th><th>NIP</th><th>Nama Guru</th><th>Jenis Kelamin</th><th>Email</th><th>No HP</th><th class="text-center">Aksi</th></tr></thead><tbody>
@forelse($gurus as $index => $item)
<tr><td>{{ $index + 1 }}</td><td>{{ $item->nip }}</td><td>{{ $item->nama }}</td><td>{{ $item->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td><td>{{ $item->email ?? '-' }}</td><td>{{ $item->no_hp ?? '-' }}</td><td class="text-center text-nowrap"><a href="{{ route('guru.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a> <form action="{{ route('guru.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" type="submit" title="Hapus"><i class="fas fa-trash"></i></button></form></td></tr>
@empty <tr><td colspan="7" class="text-center text-muted">Belum ada data.</td></tr> @endforelse
</tbody></table></div></div></div></div>
@endsection
