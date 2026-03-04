@extends('layouts.app')

@section('content')
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-100 to-primary-200 text-primary-600 flex items-center justify-center mx-auto mb-6 shadow-lg shadow-primary-500/10">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Create New Space</h1>
                <p class="text-slate-600 mt-2">Start a new shared living experience with your friends.</p>
            </div>

            <!-- Form Card -->
            <div class="premium-card p-8">
                <form action="{{ route('colocation.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Colocation Name')" class="mb-2" />
                        <x-text-input id="name" name="name" type="text" class="w-full" :value="old('name')" required autofocus placeholder="e.g. Sunny Apartment, Lake House" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="pt-4 space-y-3">
                        <x-primary-button class="w-full !py-3 !font-semibold">
                            {{ __('Create Space') }}
                        </x-primary-button>
                        
                        <a href="{{ route('colocations.index') }}" class="block text-center py-3 px-4 text-sm font-semibold text-slate-600 hover:text-slate-900 bg-slate-50 hover:bg-slate-100 rounded-xl transition-all">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
            
            <!-- Tip Section -->
            <div class="mt-8 p-6 bg-gradient-to-br from-primary-50/50 to-blue-50/50 border border-primary-200/30 rounded-xl">
                <div class="flex gap-4">
                    <div class="text-primary-600 flex-shrink-0">
                        <svg class="w-5 h-5 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900 mb-1">Pro Tip</p>
                        <p class="text-sm text-slate-600">After creating your space, you can invite roommates using their email addresses from the dashboard, and start tracking shared expenses.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection