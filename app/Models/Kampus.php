<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'kampus';
    protected $fillable = ['nama', 'alamat', 'telepon'];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }
    public function pengajuanMagang() {
        return $this->hasMany(PengajuanMagang::class);
    }
}
