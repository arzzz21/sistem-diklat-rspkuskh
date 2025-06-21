@extends('layouts.master')

@section('title', 'Input Invoice Magang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Input Biaya Magang</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('pengajuan.invoice.store', $pengajuan->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Durasi Magang (bulan)</label>
                <input type="number" name="durasi_bulan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Biaya per Mahasiswa / Bulan (Rp)</label>
                <input type="number" name="biaya_per_mahasiswa" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan & Hitung</button>
            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
