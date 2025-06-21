@extends('layouts.master')

@section('title', 'Tambah Kampus')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('kampus.store') }}" method="POST"> @csrf
            <div class="form-group">
                <label>Nama Kampus</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button> <a href="{{ route('kampus.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div> @endsection
