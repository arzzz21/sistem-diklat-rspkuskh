@extends('layouts.master')

@section('title', 'Daftar Pengajuan Magang')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Daftar Pengajuan Magang</h3>
        <a href="{{ route('pengajuan.create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah Pengajuan </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->tanggal_pengajuan }}</td>
                    <td>
                        @php $status = ucfirst(str_replace('_', ' ', $p->status)); @endphp
                        <span
                            class="badge badge-info">{{ $status }}
                        </span>
                    </td>
                    <td>{{ $p->detail->count() }}</td>
                    <td>
                        <a href="{{ route('pengajuan.show', $p->id) }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="{{ route('pengajuan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pengajuan.destroy', $p->id) }}" method="POST" class="d-inline-block"
                            onsubmit="return confirm('Hapus pengajuan ini?')"> @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if ($pengajuan->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pengajuan magang.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
