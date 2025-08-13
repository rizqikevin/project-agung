<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Pengguna::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'nama' => 'Admin',
                'password' => Hash::make('admin123'), // pastikan ini sama dengan login
                'peran' => 'admin',
            ]
        );
    }
}
