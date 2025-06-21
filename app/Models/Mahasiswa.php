<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = ['kampus_id', 'nama', 'nim', 'jurusan'];

    public function kampus() {
        return $this->belongsTo(Kampus::class);
    }
    public function pengajuanDetails() {
        return $this->hasMany(PengajuanMagangDetail::class);
    }
}
