@extends('layouts.master')

@section('title', 'Edit Mahasiswa')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST"> @csrf @method('PUT')
            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="{{ $mahasiswa->jurusan }}" required>
            </div>
            <div class="form-group">
                <label>Kampus</label>
                <select name="kampus_id" class="form-control" required>
                    @foreach($kampus as $k)
                        <option value="{{ $k->id }}" @if($mahasiswa->kampus_id == $k->id) selected @endif>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div> @endsection
