@extends('layouts.app')

@section('content')
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">
            <!-- Header -->
            <div class="mb-12">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-400 to-primary-600 text-white flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </div>
                <h1 class="text-4xl font-bold text-slate-900 tracking-tight text-center">Edit Space</h1>
                <p class="text-slate-600 mt-2 text-center">Update the details of your shared living space.</p>
            </div>

            <!-- Form -->
            <div class="premium-card p-8">
            <form action="{{ route('colocation.update', $colocation) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <x-input-label for="name" :value="__('Colocation Name')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $colocation->name)" required autofocus placeholder="e.g. Sunny Apartment" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
                    <a href="{{ route('colocations.index') }}" class="px-6 py-2.5 rounded-lg text-slate-700 font-semibold bg-slate-100 hover:bg-slate-200 transition-colors">
                        Cancel
                    </a>
                    <x-primary-button class="px-8">
                        {{ __('Update Space') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection