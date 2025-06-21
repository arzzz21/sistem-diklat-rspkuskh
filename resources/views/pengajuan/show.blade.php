@extends('layouts.master')

@section('title', 'Detail Pengajuan Magang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Pengajuan</h3>
        <a href="{{ route('pengajuan.index') }}" class="btn btn-sm btn-secondary float-right">Kembali</a>
    </div>
    <div class="card-body">

        {{-- Informasi Umum --}}
        <div class="mb-4">
            <p><strong>Kampus:</strong> {{ $pengajuan->kampus->nama }}</p>
            <p><strong>Tanggal Pengajuan:</strong> {{ $pengajuan->tanggal_pengajuan }}</p>
            <p><strong>Status:</strong>
                <span class="badge badge-info">{{ ucfirst(str_replace('_', ' ', $pengajuan->status)) }}</span>
            </p>

            @if ($pengajuan->total_biaya)
            <p><strong>Durasi Magang:</strong> {{ $pengajuan->durasi_bulan }} bulan</p>
            <p><strong>Biaya per Mahasiswa:</strong> Rp
                {{ number_format($pengajuan->biaya_per_mahasiswa, 0, ',', '.') }}</p>
            <p><strong>Total Biaya:</strong> <span class="text-success font-weight-bold">Rp
                    {{ number_format($pengajuan->total_biaya, 0, ',', '.') }}</span></p>
            @endif

            @if ($pengajuan->status === 'invoice_terbit' && !$pengajuan->bukti_pembayaran)
            <a href="{{ route('pengajuan.upload', $pengajuan->id) }}" class="btn btn-sm btn-success">
                Upload Bukti Pembayaran
            </a>
            @endif

            @if ($pengajuan->bukti_pembayaran)
            <p class="mt-3"><strong>Bukti Pembayaran:</strong>
                {{-- <a href="{{ asset('storage/' . $pengajuan->bukti_pembayaran) }}" target="_blank">Lihat Bukti</a>
                --}}
                <button type="button" class="btn btn-sm btn-info mt-2" data-toggle="modal" data-target="#modalBukti"> <i
                        class="fas fa-eye"></i> Lihat Bukti Pembayaran </button>
            </p>
            @endif

            @if ($pengajuan->status == 'menunggu')
            <a href="{{ route('pengajuan.invoice', $pengajuan->id) }}" class="btn btn-sm btn-primary mt-2">
                <i class="fas fa-file-invoice"></i> Buat Invoice
            </a>
            @endif
        </div>

        {{-- Tabel Mahasiswa --}}
        <h5>Daftar Mahasiswa</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Status Sertifikat</th>
                    <th>File Sertifikat</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuan->detail as $d)
                <tr>
                    <td>{{ $d->mahasiswa->nama }}</td>
                    <td>{{ $d->mahasiswa->nim }}</td>
                    <td>{{ $d->mahasiswa->jurusan }}</td>
                    <td>{{ ucfirst($d->status_sertifikat) }}</td>
                    <td>
                        @if ($d->file_sertifikat)
                        <a href="{{ asset('storage/' . $d->file_sertifikat) }}" target="_blank">Download</a>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada mahasiswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
{{-- Modal Preview Bukti Pembayaran --}}

<div class="modal fade" id="modalBukti" tabindex="-1" role="dialog" aria-labelledby="modalBuktiLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBuktiLabel">Preview Bukti Pembayaran</h5> <button type="button"
                    class="close" data-dismiss="modal" aria-label="Tutup"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                @php
                    $ext = pathinfo($pengajuan->bukti_pembayaran, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                    <img src="{{ asset('storage/' . $pengajuan->bukti_pembayaran) }}" class="img-fluid rounded">
                @elseif ($ext == 'pdf')
                    <iframe src="{{ asset('storage/' . $pengajuan->bukti_pembayaran) }}" width="100%" height="500px" frameborder="0"></iframe>
                @else
                    <p class="text-danger">Format file tidak didukung untuk preview.</p>
                @endif
                <a href="{{ asset('storage/' . $pengajuan->bukti_pembayaran) }}" target="_blank" class="btn btn-outline-primary mt-3">Download File</a>
            </div>
        </div>
    </div>
</div>
