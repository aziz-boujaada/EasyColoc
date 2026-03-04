<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'EasyColoc') }} - Modern Colocation Manager</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://rsms.me/">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-slate-50 text-slate-900">
        <div class="relative min-h-screen overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[800px] pointer-events-none opacity-60 z-0" style="background: var(--primary-glow)"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[800px] pointer-events-none z-0" style="background: var(--secondary-glow)"></div>

            <!-- Navigation -->
            <nav class="relative z-50 py-6 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2 group cursor-pointer transition-transform duration-300 hover:scale-105">
                    <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-900">EasyColoc</span>
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary !py-2.5">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900 transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary !py-2.5">Get Started</a>
                        @endif
                    @endauth
                </div>
            </nav>

            <!-- Hero Section -->
            <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-24 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 text-primary-700 rounded-full border border-primary-100 mb-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                    </span>
                    <span class="text-xs font-bold uppercase tracking-wider">New: Modern Expense Tracking</span>
                </div>

                <h1 class="text-5xl sm:text-7xl font-extrabold text-slate-900 tracking-tight mb-8 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-100">
                    Colocation <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-accent-600">Simplified</span><br> for modern roommates.
                </h1>

                <p class="max-w-2xl mx-auto text-xl text-slate-500 leading-relaxed mb-12 animate-in fade-in slide-in-from-bottom-12 duration-700 delay-200">
                    Manage expenses, schedules, and shared spaces with ease. The all-in-one platform for a harmonious living experience.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-in fade-in slide-in-from-bottom-16 duration-700 delay-300">
                    <a href="{{ route('register') }}" class="btn-primary !text-lg !px-8 !py-4 w-full sm:w-auto">
                        Start your colocation
                    </a>
                    <a href="#features" class="btn-secondary !text-lg !px-8 !py-4 w-full sm:w-auto">
                        View features
                    </a>
                </div>

                <!-- App Preview -->
                <div class="mt-24 relative max-w-5xl mx-auto animate-in fade-in zoom-in duration-1000 delay-500">
                    <div class="premium-card !p-2 !rounded-[2.5rem]">
                        <div class="bg-slate-50 rounded-[2rem] overflow-hidden border border-slate-200">
                            <div class="h-10 bg-white border-b border-slate-200 flex items-center px-6 gap-2">
                                <div class="flex gap-1.5">
                                    <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                                    <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                </div>
                                <div class="mx-auto w-32 h-4 bg-slate-100 rounded-full"></div>
                            </div>
                            <div class="p-12 aspect-video flex flex-col items-center justify-center bg-white">
                                <div class="text-slate-200">
                                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-slate-400 font-medium mt-4 italic">Interactive dashboard preview coming soon...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute -top-12 -left-12 w-48 h-48 bg-accent-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-12 -right-12 w-64 h-64 bg-primary-500/10 rounded-full blur-3xl pointer-events-none"></div>
                </div>
            </main>

            <!-- Features Section -->
            <section id="features" class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Everything you need</h2>
                    <p class="text-slate-500 mt-4 text-lg">Designed for transparency and harmony.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach([
                        ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Expense Tracking', 'desc' => 'Split bills, groceries, and rent without the awkward conversations.'],
                        ['icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'title' => 'Shared Calendar', 'desc' => 'Coordinate visitors, chores, and events in one centralized calendar.'],
                        ['icon' => 'M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z', 'title' => 'Roommate Chat', 'desc' => 'Communicate instantly with your roommates about what matters.']
                    ] as $feature)
                    <div class="premium-card group hover:scale-[1.02]">
                        <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary-50 group-hover:text-primary-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-slate-500 leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Footer -->
            <footer class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 border-t border-slate-200 text-center">
                <p class="text-slate-400 text-sm font-medium">
                    &copy; {{ date('Y') }} EasyColoc. Built with modern tech for modern living.
                </p>
            </footer>
        </div>
    </body>
</html>
