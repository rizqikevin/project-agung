@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Formulir Jawaban Siswa
        </h2>
    </x-slot>

    <div class="py-6">
        <form method="POST" action="{{ route('siswa.kirimJawaban') }}">
            @csrf
            <div class="container mx-auto px-4">
                @foreach ($jurusans as $jurusan)
                    <div class="my-6">
                        <h3 class="text-lg font-bold text-gray-700">{{ $jurusan->nama }}</h3>
                        @foreach ($jurusan->pertanyaans as $pertanyaan)
                            <div class="mt-4">
                                <p class="text-gray-800">{{ $pertanyaan->teks }}</p>
                                <div class="flex space-x-4 mt-2">
                                    @foreach (['Suka', 'Netral', 'Tidak Suka'] as $opsi)
                                        <label class="inline-flex items-center">
                                            <input type="radio"
                                                name="jawaban[{{ $pertanyaan->id }}]"
                                                value="{{ $opsi }}"
                                                class="form-radio text-indigo-600"
                                                required>
                                            <span class="ml-2">{{ $opsi }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <button type="submit" class="mt-6 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Kirim Jawaban
                </button>
            </div>
        </form>
    </div>
@endsection
