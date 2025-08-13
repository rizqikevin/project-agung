@extends('layouts.app') {{-- Ganti dengan layout kamu jika beda --}}

@section('content')
    <div class="max-w-xl mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Lengkapi Biodata</h2>
        <form action="{{ route('siswa.kirimBiodata') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama_lengkap" class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}"
                       class="w-full border rounded mt-1 p-2">
            </div>

            <div class="mb-4">
                <label for="nis" class="block text-sm font-medium">NIS</label>
                <input type="text" name="nis" id="nis" required value="{{ old('nis') }}"
                       class="w-full border rounded mt-1 p-2">
            </div>

            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required class="w-full border rounded mt-1 p-2">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="asal_sekolah" class="block text-sm font-medium">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" required value="{{ old('asal_sekolah') }}"
                       class="w-full border rounded mt-1 p-2">
            </div>

            <div class="text-right">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Lanjut Tes
                </button>
            </div>
        </form>
    </div>
@endsection
