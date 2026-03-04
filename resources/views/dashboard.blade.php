<x-app-layout>
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-bold text-slate-900 tracking-tight">Dashboard</h1>
                    <p class="text-slate-600 mt-2 text-lg">Welcome back! Manage your colocation space efficiently.</p>
                </div>
                <a href="{{ route('colocation.create') }}" class="btn-primary w-fit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Colocation
                </a>
            </div>

            <!-- Welcome Card -->
            <div class="premium-card p-8 mb-12 overflow-hidden relative">
                <div class="absolute top-0 right-0 w-72 h-72 bg-primary-100/30 rounded-full blur-3xl -z-10"></div>
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 mb-2">Welcome back, {{ Auth::user()->name }}!</h2>
                        <p class="text-slate-600 max-w-md">You're successfully logged in. Start managing your colocation spaces, track expenses, and collaborate with your roommates.</p>
                    </div>
                    <div class="mt-6 md:mt-0">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Stat Card 1 -->
                <div class="premium-card p-6 hover:shadow-[0_20px_40px_rgba(15,23,42,0.08)] transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="badge badge-primary">Active</span>
                    </div>
                    <h3 class="text-slate-600 text-sm font-medium mb-1">Total Colocations</h3>
                    <p class="text-3xl font-bold text-slate-900">--</p>
                </div>

                <!-- Stat Card 2 -->
                <div class="premium-card p-6 hover:shadow-[0_20px_40px_rgba(15,23,42,0.08)] transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h.01M13 16h2v2h-2v-2zm4-4a2 2 0 11-4 0 2 2 0 014 0zM9 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h4m0 0a2 2 0 012-2m-2 2a2 2 0 00-2-2m2 2a2 2 0 012-2m-2 2h4" />
                            </svg>
                        </div>
                        <span class="badge badge-success">Users</span>
                    </div>
                    <h3 class="text-slate-600 text-sm font-medium mb-1">Total Members</h3>
                    <p class="text-3xl font-bold text-slate-900">--</p>
                </div>

                <!-- Stat Card 3 -->
                <div class="premium-card p-6 hover:shadow-[0_20px_40px_rgba(15,23,42,0.08)] transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="badge badge-danger">Pending</span>
                    </div>
                    <h3 class="text-slate-600 text-sm font-medium mb-1">Pending Expenses</h3>
                    <p class="text-3xl font-bold text-slate-900">--</p>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="premium-card p-8 bg-gradient-to-br from-slate-50 to-blue-50/30">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Get Started</h3>
                        <p class="text-slate-600">Create your first colocation or join an existing one to start managing expenses and coordinating with your roommates.</p>
                    </div>
                    <a href="{{ route('colocation.index') }}" class="btn-primary w-fit text-nowrap">
                        View Colocations
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
