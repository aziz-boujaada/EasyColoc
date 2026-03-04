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
    <body class="font-sans antialiased text-slate-900 bg-white">
        <div class="min-h-screen relative overflow-hidden">
            <div class="fixed inset-0 bg-gradient-to-br from-slate-50/50 via-white to-blue-50/30 pointer-events-none z-0"></div>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="relative pt-20 pb-8 border-b border-slate-200/50 bg-white/50 backdrop-blur-xl z-10">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="relative z-10">
                @yield('content')
            </main>
        </div>
    </body>
</html>
