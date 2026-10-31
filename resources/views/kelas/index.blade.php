@extends('layouts.main')
@section('title', 'Data Kelas')
@section('content')
<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4"><h1 class="h3 mb-0 text-gray-800">Data Kelas</h1><a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm mr-1"></i>Tambah Kelas</a></div>
 <div class="card shadow mb-4"><div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Daftar Data Kelas</h6></div><div class="card-body"><div class="table-responsive"><table class="table table-bordered table-striped table-hover"><thead class="bg-primary text-white"><tr><th>No</th><th>Nama Kelas</th><th>Tingkat</th><th>Jurusan</th><th>Tahun Ajaran</th><th>Jumlah Siswa</th><th class="text-center">Aksi</th></tr></thead><tbody>
@forelse($kelas as $index => $item)
<tr><td>{{ $index + 1 }}</td><td>{{ $item->nama_kelas }}</td><td>{{ $item->tingkat }}</td><td>{{ $item->jurusan }}</td><td>{{ $item->tahun_ajaran }}</td><td>{{ $item->siswas_count }} siswa</td><td class="text-center text-nowrap"><a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a> <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" type="submit" title="Hapus"><i class="fas fa-trash"></i></button></form></td></tr>
@empty <tr><td colspan="7" class="text-center text-muted">Belum ada data.</td></tr> @endforelse
</tbody></table></div></div></div></div>
@endsection
