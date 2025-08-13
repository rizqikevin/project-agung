<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'mata_pelajaran',
        'prospek_kerja',
        'gaji_rata_rata',
        'gambar',
    ];

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
