<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'teks',
        'jurusan_id',
        'level_penting',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
