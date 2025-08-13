<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Optional transition -->
    <style>
        body {
            transition: background 0.3s ease, color 0.3s ease;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gradient-to-br from-blue-100 via-white to-blue-200 text-gray-800 dark:text-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 flex flex-col min-h-screen">

    {{-- Navigation --}}
    @include('layouts.navigation')

    {{-- Page Header --}}
    @hasSection('header')
        <header class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white shadow-md dark:from-gray-800 dark:via-gray-700 dark:to-gray-800">
            <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>
    @endif

    {{-- Main Content --}}
    <main class="flex-1 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    {{-- Sticky Footer --}}
    <footer class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center text-sm">
            <div class="mb-2 sm:mb-0">
                © {{ date('Y') }} <strong>{{ config('app.name', 'Pakar Jurusan') }}</strong>. All rights reserved.
            </div>
            <div class="space-x-4">
                <a href="https://www.smkn5kotaserang.sch.id/" target="_blank" class="hover:underline hover:text-yellow-200 transition">
                    SMKN 5 Kota Serang
                </a>
 
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
