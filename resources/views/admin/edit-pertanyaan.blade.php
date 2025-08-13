@extends('layouts.app')

@section('content')
<form action="{{ route('admin.updatePertanyaan', $pertanyaan->id) }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="teks" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teks Pertanyaan</label>
        <textarea id="teks" name="teks" required
            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">{{ old('teks', $pertanyaan->teks) }}</textarea>
    </div>

    <div class="mb-4">
        <label for="jurusan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jurusan</label>
        <select id="jurusan_id" name="jurusan_id" required
            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
            @foreach ($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}" {{ $pertanyaan->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                    {{ $jurusan->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="level_penting" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Level Penting</label>
        <input type="number" id="level_penting" name="level_penting" min="1" max="5" required
            value="{{ old('level_penting', $pertanyaan->level_penting) }}"
            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div class="flex justify-between">
        <a href="{{ route('admin.kelolaPertanyaan') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-white hover:bg-gray-600">
           Batal
        </a>

        <button type="submit"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
           Simpan Perubahan
        </button>
    </div>
</form>
@endsection