@extends('layouts.master')

@section('title', 'Edit Kampus')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('kampus.update', $kampus->id) }}" method="POST"> @csrf @method('PUT')
            <div
                class="form-group"> <label>Nama Kampus</label> <input type="text" name="nama" class="form-control"
                    value="{{ $kampus->nama }}" required> </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $kampus->alamat }}">
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ $kampus->telepon }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kampus.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
