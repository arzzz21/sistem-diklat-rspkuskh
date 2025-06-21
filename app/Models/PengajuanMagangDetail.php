<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMagangDetail extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_magang_detail';

    protected $fillable = [
        'pengajuan_magang_id',
        'mahasiswa_id',
        'status_sertifikat',
        'file_sertifikat',
    ];

    public function pengajuan() {
        return $this->belongsTo(PengajuanMagang::class, 'pengajuan_magang_id');
    }
    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }
}
