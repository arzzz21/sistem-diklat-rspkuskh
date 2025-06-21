<?php

namespace App\Http\Controllers;

use App\Models\PengajuanMagang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PengajuanMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = PengajuanMagang::withCount('detail')->orderByDesc('created_at')->get();

        return view('pengajuan.index', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();

        return view('pengajuan.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengajuan' => 'required|date',
            'mahasiswa_id' => 'required|array|min:1',
        ]);
        // Simpan pengajuan baru
        $pengajuan = PengajuanMagang::create([
            'kampus_id' => auth()->user()->kampus_id ?? 1, // atau ambil dari user login kampus
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status' => 'menunggu',
        ]);

        // Simpan detail mahasiswa
        foreach ($request->mahasiswa_id as $mahasiswaId) {
            \App\Models\PengajuanMagangDetail::create([
                'pengajuan_magang_id' => $pengajuan->id,
                'mahasiswa_id' => $mahasiswaId,
                'status_sertifikat' => 'belum',
            ]);
        }

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengajuanMagang  $pengajuanMagang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengajuan = \App\Models\PengajuanMagang::with('kampus', 'detail.mahasiswa')->findOrFail($id);
        return view('pengajuan.show', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengajuanMagang  $pengajuanMagang
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanMagang $pengajuanMagang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanMagang  $pengajuanMagang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanMagang $pengajuanMagang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengajuanMagang  $pengajuanMagang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengajuanMagang $pengajuanMagang)
    {
        //
    }

    public function invoice($id)
    {
        $pengajuan = \App\Models\PengajuanMagang::withCount('detail')->findOrFail($id);
        return view('pengajuan.invoice', compact('pengajuan'));
    }

    public function invoiceStore(Request $request, $id)
    {
        $request->validate([
            'durasi_bulan' => 'required|integer|min:1',
            'biaya_per_mahasiswa' => 'required|integer|min:0',
        ]);

        $pengajuan = \App\Models\PengajuanMagang::withCount('detail')->findOrFail($id);

        $total = $request->biaya_per_mahasiswa * $pengajuan->detail_count * $request->durasi_bulan;

        $pengajuan->update([
            'durasi_bulan' => $request->durasi_bulan,
            'biaya_per_mahasiswa' => $request->biaya_per_mahasiswa,
            'total_biaya' => $total,
            'status' => 'invoice_terbit'
        ]);

        return redirect()->route('pengajuan.show', $pengajuan->id)->with('success', 'Invoice berhasil dihitung.');
    }

    public function uploadBukti($id)
    {
        $pengajuan = \App\Models\PengajuanMagang::findOrFail($id);

        return view('pengajuan.upload-bayar', compact('pengajuan'));
    }

    public function storeBukti(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $pengajuan = \App\Models\PengajuanMagang::findOrFail($id);

        $file = $request->file('bukti_pembayaran');
        $path = $file->store('bukti_pembayaran', 'public');

        $pengajuan->update([
            'bukti_pembayaran' => $path,
            'status' => 'menunggu_verifikasi',
        ]);

        return redirect()->route('pengajuan.show', $pengajuan->id)->with('success', 'Bukti pembayaran berhasil diupload.');
    }

}
