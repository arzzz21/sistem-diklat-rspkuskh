@extends('layouts.master')

@section('title', 'Upload Bukti Pembayaran')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Upload Bukti Pembayaran</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('pengajuan.upload.store', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Total Tagihan</label>
                <input type="text" class="form-control" value="Rp {{ number_format($pengajuan->total_biaya, 0, ',', '.') }}" disabled>
            </div>
            <div class="form-group">
                <label>Upload Bukti Pembayaran (PDF/JPG/PNG)</label>
                <input type="file" name="bukti_pembayaran" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
            </div>
            <button type="submit" class="btn btn-success">Kirim</button>
            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
