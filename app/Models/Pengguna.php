<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'penggunas'; // Pastikan nama tabel sesuai
protected $fillable = [
    'nama',
    'email',
    'password',
    'peran',
    'nama_lengkap',
    'nis',
    'jenis_kelamin',
    'asal_sekolah',
];


    protected $hidden = [
        'password',
        'remember_token',
    ];
}
