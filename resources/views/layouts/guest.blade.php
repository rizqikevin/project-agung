<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-blue-200">

    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-6">

            <!-- Logo (opsional, bisa dihapus jika tidak perlu) -->
            <div class="flex justify-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-blue-500" />
                </a>
            </div>

            <!-- Card -->
            <div class="bg-white shadow-lg rounded-xl p-6 sm:p-8 border border-blue-100">
                {{ $slot }}
            </div>

        </div>
    </div>

</body>
</html>
