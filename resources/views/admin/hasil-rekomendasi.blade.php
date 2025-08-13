@extends('layouts.app')

@section('content')
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Hasil Rekomendasi</h1>

        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded shadow">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Nama Siswa</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Asal Sekolah</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Jurusan</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Skor</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                    @foreach ($rekomendasis as $data)
                        <tr>
                            <td class="px-4 py-2 text-gray-800 dark:text-white">
                                {{ $data->siswa->nama_lengkap ?? '-' }}
                            </td>
                            <td class="px-4 py-2 text-gray-800 dark:text-white">
                                {{ $data->siswa->asal_sekolah ?? '-' }}
                            </td>
                            <td class="px-4 py-2 text-gray-800 dark:text-white">
                                {{ $data->jurusan->nama ?? '-' }}
                            </td>
                            <td class="px-4 py-2 text-gray-800 dark:text-white">
                                {{ $data->skor_total }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
