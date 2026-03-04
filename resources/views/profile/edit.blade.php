<x-app-layout>
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12">
                <h2 class="text-4xl font-bold text-slate-900 tracking-tight">{{ __("Profile Settings") }}</h2>
                <p class="text-slate-600 mt-2 text-lg">{{ __("Manage your account settings and preferences.") }}</p>
            </div>

            <div class="space-y-6">
                <div class="premium-card p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="premium-card p-8">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="premium-card p-8 border-red-200/50 bg-gradient-to-br from-red-50/50 to-pink-50/30">
                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
