@extends('layouts.app')

@section('content')
<div class="py-10 bg-gradient-to-br from-blue-100 via-white to-blue-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Sambutan -->
        <div class="mb-10 text-center">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white">
                👋 Selamat Datang, {{ Auth::user()->nama_lengkap ?? 'Siswa' }}
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-300 text-sm">
                Silakan pilih jurusan untuk melihat detail atau mulai tes rekomendasi jurusan.
            </p>
        </div>

        <!-- Daftar Jurusan -->
        @if($jurusans->isNotEmpty())
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach($jurusans as $jurusan)
                    <a href="{{ route('siswa.jurusanDetail', $jurusan->id) }}"
                       class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden hover:shadow-md hover:scale-[1.02] transition duration-200 border dark:border-gray-700">
                        <img src="{{ $jurusan->gambar ? asset('storage/' . $jurusan->gambar) : asset('storage/jurusan/default.jpg') }}"
                             alt="{{ $jurusan->nama }}"
                             class="w-full h-28 object-cover">
                        <div class="p-3 text-center">
                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white truncate">
                                {{ $jurusan->nama }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 dark:text-gray-400 mt-8">
                Belum ada jurusan tersedia.
            </div>
        @endif

        <!-- Tombol Mulai Tes -->
        <div class="mt-12 text-center">
            <a href="{{ route('siswa.form') }}"
               class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-700 transition">
                🚀 Mulai Tes Rekomendasi
            </a>
        </div>

    </div>
</div>
@endsection
