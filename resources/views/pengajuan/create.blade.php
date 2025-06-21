@extends('layouts.master')

@section('title', 'Tambah Pengajuan Magang')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Pengajuan Magang</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('pengajuan.store') }}" method="POST"> @csrf
            <div class="form-group">
                <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                <input type="date" name="tanggal_pengajuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mahasiswa">Pilih Mahasiswa</label>
                <select name="mahasiswa_id[]" class="form-control" multiple size="8" required>
                    @foreach ($mahasiswa as $m)
                    <option
                        value="{{ $m->id }}">{{ $m->nama }} ({{ $m->nim }}) - {{ $m->kampus->nama }}
                    </option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Gunakan CTRL + klik untuk memilih lebih dari satu</small>
            </div>
            <button type="submit" class="btn btn-primary">Ajukan</button>
            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
