<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMagang extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_magang';

    protected $fillable = [
        'kampus_id',
        'tanggal_pengajuan',
        'status',
        'invoice_file',
        'bukti_pembayaran',
        'durasi_bulan',
        'biaya_per_mahasiswa',
        'total_biaya',
    ];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class);
    }

    public function detail()
    {
        return $this->hasMany(PengajuanMagangDetail::class, 'pengajuan_magang_id');
    }
}
