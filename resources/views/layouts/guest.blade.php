<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sinar Mandiri') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-200 antialiased bg-gradient-to-br from-gray-900 via-black to-gray-900">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
            <!-- Background decoration -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none flex items-center justify-center">
                <img src="{{ asset('images/logo.png') }}" class="opacity-[0.03] w-[500px] h-[500px] object-contain pointer-events-none select-none" style="filter: grayscale(1);">
                <div class="absolute top-0 left-0 w-96 h-96 bg-[#D4AF37] rounded-full mix-blend-screen filter blur-[100px] opacity-10 animate-blob"></div>
                <div class="absolute top-0 right-0 w-96 h-96 bg-gray-600 rounded-full mix-blend-screen filter blur-[100px] opacity-10 animate-blob animation-delay-2000"></div>
            </div>

            <div class="relative z-10 w-full sm:max-w-md">
                <div class="bg-gray-800 shadow-xl sm:rounded-xl overflow-hidden border border-gray-700">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <style>
            @keyframes blob {
                0%, 100% { transform: translate(0, 0) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
        </style>
    </body>
</html>
