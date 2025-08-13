<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = [
        'siswa_id',
        'pertanyaan_id',
        'jawaban',
        'nilai',
    ];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Pengguna::class, 'siswa_id');
    }
}
