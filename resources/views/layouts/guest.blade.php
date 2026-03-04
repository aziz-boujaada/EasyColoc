<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://rsms.me/">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased bg-white">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
            <!-- Background Gradient -->
            <div class="fixed inset-0 bg-gradient-to-br from-slate-50 via-white to-blue-50/50 pointer-events-none"></div>
            <div class="fixed top-0 right-0 w-96 h-96 bg-primary-100/20 rounded-full blur-3xl opacity-40 pointer-events-none"></div>
            <div class="fixed bottom-0 left-0 w-96 h-96 bg-purple-100/20 rounded-full blur-3xl opacity-40 pointer-events-none"></div>
            
            <div class="z-10 transition-transform duration-500 hover:scale-110">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-primary-600" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-6 py-10 premium-card z-10 shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
