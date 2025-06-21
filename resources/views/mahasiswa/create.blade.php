@extends('layouts.master')

@section('title', 'Tambah Mahasiswa')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('mahasiswa.store') }}" method="POST"> @csrf <div class="form-group"> <label>Nama
                    Mahasiswa</label> <input type="text" name="nama" class="form-control" required> </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control"required>
            </div>
            <div class="form-group">
                <label>Kampus</label>
                <select name="kampus_id" class="form-control" required>
                    <option value="">-- Pilih Kampus --</option>
                    @foreach($kampus as $k)
                        <option value="{{ $k->id }}"> {{ $k->nama }}</option>
                    @endforeach
                </select> </div> <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div> @endsection
