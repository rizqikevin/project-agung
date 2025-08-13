<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'jurusan_id',
        'skor_total',
        'nama_lengkap',
        'asal_sekolah',
        'id'
    ];

    public function siswa()
    {
        return $this->belongsTo(Pengguna::class, 'siswa_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
