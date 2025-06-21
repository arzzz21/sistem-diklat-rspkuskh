@extends('layouts.master')
@section('title', 'Data Mahasiswa')
@section('content')
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>NIM</th>
      <th>Jurusan</th>
      <th>Kampus</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($mahasiswa as $m)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $m->nama }}</td>
      <td>{{ $m->nim }}</td>
      <td>{{ $m->jurusan }}</td>
      <td>{{ $m->kampus->nama ?? '-' }}</td>
      <td>
        <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline-block;">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
