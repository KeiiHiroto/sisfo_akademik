@extends('layouts.main')
@section('title', 'Data Mata Pelajaran')
@section('content')
<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4"><h1 class="h3 mb-0 text-gray-800">Data Mata Pelajaran</h1><a href="{{ route('mapel.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm mr-1"></i>Tambah Mapel</a></div>
 <div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Data Mata Pelajaran</h6></div><div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped table-hover"><thead class="bg-primary text-white"><tr><th>No</th><th>Kode Mapel</th><th>Nama Mata Pelajaran</th><th>KKM Minimum</th><th class="text-center">Aksi</th></tr></thead><tbody>
@forelse($mapels as $index => $item)
<tr><td>{{ $index + 1 }}</td><td>{{ $item->kode_mapel }}</td><td>{{ $item->nama_mapel }}</td><td>{{ $item->kkm }}</td><td class="text-center text-nowrap"><a href="{{ route('mapel.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a> <form action="{{ route('mapel.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" type="submit" title="Hapus"><i class="fas fa-trash"></i></button></form></td></tr>
@empty <tr><td colspan="5" class="text-center text-muted">Belum ada data.</td></tr> @endforelse
</tbody></table></div></div></div></div>
@endsection
