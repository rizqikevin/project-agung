@extends('layouts.app')

@section('content')
<div class="py-6 bg-gradient-to-br from-gray-100 via-white to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Statistik Ringkas --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5 mb-6">
            @php
                $panels = [
                    [
                        'title' => 'Pengguna',
                        'value' => $totalPengguna,
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1
                            m4-4a4 4 0 10-8 0 4 4 0 008 0z" />'
                    ],
                    [
                        'title' => 'Siswa',
                        'value' => $totalSiswa,
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0v6" />'
                    ],
                    [
                        'title' => 'Jurusan',
                        'value' => $totalJurusan,
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 7h18M3 12h18M3 17h18" />'
                    ],
                    [
                        'title' => 'Pertanyaan',
                        'value' => $totalPertanyaan,
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 6v6h4m4 0a8 8 0 11-16 0 8 8 0 0116 0z" />'
                    ],
                ];
            @endphp

            @foreach ($panels as $panel)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 hover:shadow-md transition border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                {!! $panel['icon'] !!}
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ $panel['title'] }}</div>
                            <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $panel['value'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Grafik Jumlah Siswa per Jurusan --}}
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border border-gray-200 dark:border-gray-700">
            <h2 class="text-base font-semibold text-gray-700 dark:text-gray-200 mb-3">📊 Jumlah Siswa per Jurusan</h2>
            <div class="h-56">
                <canvas id="grafikJurusan" class="w-full h-full"></canvas>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('{{ route("admin.grafikData") }}')
            .then(res => res.json())
            .then(data => {
                const ctx = document.getElementById('grafikJurusan').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.map(item => item.jurusan),
                        datasets: [{
                            label: 'Jumlah Siswa',
                            data: data.map(item => item.total),
                            backgroundColor: [
                                '#64748b', // slate
                                '#0f766e', // teal
                                '#6d28d9', // violet
                                '#f59e0b', // amber
                                '#dc2626'  // red
                            ],
                            borderRadius: 6,
                            barThickness: 26
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: { mode: 'index', intersect: false }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    font: { size: 12 },
                                    color: '#6b7280'
                                },
                                grid: { color: '#e5e7eb' }
                            },
                            x: {
                                ticks: {
                                    font: { size: 12 },
                                    color: '#6b7280'
                                },
                                grid: { display: false }
                            }
                        }
                    }
                });
            });
    });
</script>
@endpush
