<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Pengguna::updateOrCreate(
    ['email' => 'admin@example.com'],
    [
        'nama' => 'Admin',
        'nama_lengkap' => 'Admin Utama',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'peran' => 'admin',
    ]
);

    }
}
