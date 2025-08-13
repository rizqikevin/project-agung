@extends('layouts.app')



@section('content')
    <div class="py-8 bg-gradient-to-br from-blue-100 via-white to-blue-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen transition">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 space-y-6 hover:shadow-2xl transition duration-300">

                <!-- Nama Jurusan -->
                <div>
                    <h3 class="text-3xl font-extrabold text-blue-700 dark:text-blue-300 mb-2">
                        {{ $jurusan->nama }}
                    </h3>
                    <p class="text-sm italic text-gray-500 dark:text-gray-400">
                        Informasi lengkap mengenai jurusan ini.
                    </p>
                </div>

                <!-- Gambar Jurusan -->
                @if($jurusan->gambar)
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                        <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="Gambar Jurusan" class="w-full rounded-lg shadow-md">
                    </div>
                @endif

                <!-- Deskripsi -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">📝 Deskripsi</h4>
                    <p class="text-gray-800 dark:text-gray-100 mt-1">{{ $jurusan->deskripsi }}</p>
                </div>

                <!-- Mata Pelajaran -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">📘 Mata Pelajaran</h4>
                    <p class="text-gray-800 dark:text-gray-100 mt-1">{{ $jurusan->mata_pelajaran }}</p>
                </div>

                <!-- Prospek Kerja -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">💼 Prospek Kerja</h4>
                    <p class="text-gray-800 dark:text-gray-100 mt-1">{{ $jurusan->prospek_kerja }}</p>
                </div>

                <!-- Gaji Rata-Rata -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">💰 Gaji Rata-Rata</h4>
                    <p class="text-gray-800 dark:text-gray-100 mt-1">
                        Rp{{ number_format($jurusan->gaji_rata_rata, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Tombol Kembali -->
                <div class="pt-6 text-right">
                    <a href="{{ route('admin.kelolaJurusan') }}"
                        class="inline-flex items-center px-5 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        ← Kembali ke Daftar Jurusan
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
