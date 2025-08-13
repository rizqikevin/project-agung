<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Jurusan::create([
        'nama' => 'Ilmu Komputer',
        'deskripsi' => 'Jurusan yang mempelajari teknologi komputer.',
        'mata_pelajaran' => 'Matematika, Algoritma, Struktur Data, dll.',
        'prospek_kerja' => 'Programmer, Sistem Analis, dll.',
        'gaji_rata_rata' => 7000000
    ]);

    \App\Models\Jurusan::create([
        'nama' => 'Akuntansi',
        'deskripsi' => 'Jurusan yang mempelajari tentang keuangan.',
        'mata_pelajaran' => 'Akuntansi Dasar, Pajak, Ekonomi, dll.',
        'prospek_kerja' => 'Akuntan, Auditor, dll.',
        'gaji_rata_rata' => 8000000
    ]);
}

}
