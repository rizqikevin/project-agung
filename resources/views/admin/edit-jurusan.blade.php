@extends('layouts.app')

@section('header')
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
        Edit Jurusan
    </h2>
@endsection

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('admin.updateJurusan', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Tidak gunakan @method('PUT') karena route menggunakan POST --}}

                <!-- Nama Jurusan -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Jurusan</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $jurusan->nama) }}" required
                        class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" required
                        class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                </div>

                <!-- Mata Pelajaran -->
                <div class="mb-4">
                    <label for="mata_pelajaran" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata Pelajaran</label>
                    <textarea id="mata_pelajaran" name="mata_pelajaran" required
                        class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">{{ old('mata_pelajaran', $jurusan->mata_pelajaran) }}</textarea>
                </div>

                <!-- Prospek Kerja -->
                <div class="mb-4">
                    <label for="prospek_kerja" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prospek Kerja</label>
                    <textarea id="prospek_kerja" name="prospek_kerja" required
                        class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">{{ old('prospek_kerja', $jurusan->prospek_kerja) }}</textarea>
                </div>

                <!-- Gaji Rata-Rata -->
                <div class="mb-4">
                    <label for="gaji_rata_rata" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gaji Rata-Rata</label>
                    <input type="number" id="gaji_rata_rata" name="gaji_rata_rata"
                        value="{{ old('gaji_rata_rata', $jurusan->gaji_rata_rata) }}" required
                        class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                </div>

                <!-- Upload Gambar -->
                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar (opsional)</label>
                    <input type="file" id="gambar" name="gambar"
                        class="mt-1 block w-full text-white file:bg-blue-600 file:border-none file:rounded file:px-4 file:py-2 file:text-white hover:file:bg-blue-700">
                    
                    @if ($jurusan->gambar)
                        <div class="mt-2">
                            <p class="text-sm text-gray-300">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="Gambar Jurusan" class="w-48 mt-1 rounded">
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between">
                    <a href="{{ route('admin.kelolaJurusan') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
