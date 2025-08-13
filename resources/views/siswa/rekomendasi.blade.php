@extends('layouts.app')

@section('content')
    <div class="py-10 bg-gradient-to-br from-blue-100 via-white to-blue-200 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-white shadow-xl rounded-2xl p-8 space-y-6">

                <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">
                     Rekomendasi Jurusan Terbaik Untuk Kamu
                </h2>

                <div class="flex flex-col md:flex-row gap-8">

                    {{-- KIRI: Info Rekomendasi Utama --}}
                    <div class="md:w-1/2 space-y-6">
                        <div class="bg-indigo-50 border border-indigo-200 p-6 rounded-xl shadow-md">
                            <p class="text-xl font-semibold text-indigo-800 mb-2">✅ Jurusan Direkomendasikan:</p>
                            <h3 class="text-2xl font-bold text-indigo-600 mb-4">
                                {{ $rekomendasiUtama->jurusan->nama }}
                            </h3>

                            <p class="text-gray-700 mb-4">
                                <strong>Deskripsi:</strong><br>
                                {{ $rekomendasiUtama->jurusan->deskripsi }}
                            </p>

                            {{-- Tambahkan Alasan --}}
                            <p class="text-gray-700">
                                <strong>Alasan Direkomendasikan:</strong><br>
                                Kamu paling banyak menjawab "<span class="text-green-600 font-semibold">Suka</span>" pada pertanyaan yang berkaitan dengan jurusan <span class="font-bold text-indigo-600">{{ $rekomendasiUtama->jurusan->nama }}</span>. Ini menunjukkan minat dan potensi besar kamu di bidang ini.
                            </p>
                        </div>
                    </div>

                    {{-- KANAN: Grafik Donat --}}
                    <div class="md:w-1/2 flex items-center justify-center">
                        <canvas id="grafikDonat" width="300" height="300"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @php
        $labelGrafik = [];
        $dataGrafik = [];
        $warnaGrafik = [];

        foreach ($semuaRekomendasi as $r) {
            $labelGrafik[] = $r->jurusan->nama;
            $dataGrafik[] = $r->skor_total;
            $warnaGrafik[] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafikDonat').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($labelGrafik),
                datasets: [{
                    data: @json($dataGrafik),
                    backgroundColor: @json($warnaGrafik),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#4B5563',
                            font: { size: 14 }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Visualisasi Minat Jurusan',
                        color: '#1E3A8A',
                        font: { size: 18 }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.parsed} poin`;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    </script>
@endsection
