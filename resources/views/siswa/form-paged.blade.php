@extends('layouts.app')

@section('content')
<div class="py-8 bg-gradient-to-br from-blue-100 via-white to-blue-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 sm:p-8 space-y-6 animate-fade-in">

            <h2 class="text-2xl sm:text-3xl font-bold text-center text-indigo-700 dark:text-indigo-300 mb-6">
                Formulir Minat Siswa – Halaman {{ $halaman }}
            </h2>

            <form method="POST" action="{{ route('siswa.kirimJawabanPerHalaman') }}">
                @csrf

                @foreach ($pertanyaans as $pertanyaan)
                    @php
                        $jawabanSebelumnya = \App\Models\Jawaban::where('siswa_id', auth()->id())
                            ->where('pertanyaan_id', $pertanyaan->id)
                            ->value('jawaban');
                    @endphp

                    <div class="p-4 border rounded-xl bg-gray-50 dark:bg-gray-700 shadow-sm hover:shadow-md transition duration-300">
                        <p class="text-gray-800 dark:text-white font-medium text-base sm:text-lg mb-4">
                            {{ $loop->iteration }}. {{ $pertanyaan->teks }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                            @foreach (['Suka', 'Netral', 'Tidak Suka'] as $opsi)
                                <label class="relative w-full sm:w-auto">
                                    <input type="radio"
                                           name="jawaban[{{ $pertanyaan->id }}]"
                                           value="{{ $opsi }}"
                                           class="peer hidden"
                                           {{ $jawabanSebelumnya === $opsi ? 'checked' : '' }}
                                           required>
                                    <div class="w-full sm:w-36 text-center px-4 py-2 sm:py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold transition duration-200 hover:scale-105 cursor-pointer peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600 shadow">
                                        {{ $opsi }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                {{-- Navigasi Halaman --}}
                <div class="flex flex-col sm:flex-row justify-between items-center mt-8 gap-4">
                    @if ($halaman > 1)
                        <a href="{{ route('siswa.kembaliHalaman') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 sm:py-3 rounded-md shadow hover:scale-105 transition">
                            ⬅️ Kembali
                        </a>
                    @else
                        <span></span>
                    @endif

                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 sm:py-3 rounded-md shadow hover:scale-105 transition">
                        {{ $halaman >= ceil(session('soal_siswa') ? count(session('soal_siswa')) / 4 : 1) ? '📊 Lihat Hasil Rekomendasi' : '➡️ Selanjutnya' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .animate-fade-in {
        animation: fade-in 0.4s ease-in-out;
    }

    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
