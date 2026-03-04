<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="scrolled ? 'bg-white/70 backdrop-blur-xl shadow-[0_4px_20px_rgba(15,23,42,0.08)]' : 'bg-transparent'"
     class="fixed top-0 w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div :class="scrolled ? 'rounded-2xl my-2 px-6 py-3' : 'py-4'" class="flex justify-between items-center transition-all duration-300">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="transition-transform duration-300 hover:scale-105">
                        <x-application-logo class="block h-10 w-auto fill-current text-primary-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-12 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-slate-600 hover:text-primary-600 font-medium transition-colors duration-200">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')" class="text-slate-600 hover:text-primary-600 font-medium transition-colors duration-200">
                        {{ __('Admin Panel') }}
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-slate-100/50 transition-all duration-200 group">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 text-white flex items-center justify-center font-bold text-sm ring-2 ring-white/50">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-semibold text-slate-700">{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-slate-400 group-hover:text-slate-600 transition-transform duration-300" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-4 border-b border-slate-200/50 mb-2">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Account</p>
                                <p class="text-sm font-semibold text-slate-900 truncate mt-1">{{ Auth::user()->email }}</p>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')" class="rounded-lg hover:bg-primary-50/80 hover:text-primary-600 transition-colors">
                                {{ __('Profile Settings') }}
                            </x-dropdown-link>

                            @if(auth()->check() && auth()->user()->role === 'admin')
                            <x-dropdown-link :href="route('admin.dashboard')" class="rounded-lg hover:bg-primary-50/80 hover:text-primary-600 transition-colors">
                                {{ __('Admin Panel') }}
                            </x-dropdown-link>
                            <div class="border-t border-slate-200/50 my-2"></div>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="rounded-lg hover:bg-red-50/80 hover:text-red-600 transition-colors">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-lg hover:bg-slate-100 transition-colors duration-200">
                    <svg class="h-6 w-6 text-slate-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/95 backdrop-blur-xl border-b border-slate-200/50 shadow-[0_8px_32px_rgba(15,23,42,0.1)] fixed w-full top-[70px] left-0">
        <div class="pt-4 pb-3 space-y-1 px-4 max-w-7xl mx-auto">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-lg">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if(auth()->check() && auth()->user()->role === 'admin')
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')" class="rounded-lg">
                {{ __('Admin Panel') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-6 border-t border-slate-200/50 px-4 max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-4 px-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 text-white flex items-center justify-center font-bold ring-2 ring-white/50">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-semibold text-slate-900">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-lg">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="rounded-lg text-red-600 hover:bg-red-50">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="h-20"></div>
