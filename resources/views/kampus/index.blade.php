@extends('layouts.master')
@section('title', 'Data Kampus')
@section('content')
<a href="{{ route('kampus.create') }}" class="btn btn-primary mb-3">Tambah Kampus</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kampus as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->alamat }}</td>
            <td>{{ $k->telepon }}</td>
            <td>
            <a href="{{ route('kampus.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('kampus.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
