@extends('layouts.app')

@section('content')
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                <div>
                    <h1 class="text-4xl font-bold text-slate-900 tracking-tight">My Colocations</h1>
                    <p class="text-slate-600 mt-2 text-lg">Manage your shared living spaces and coordinate with your roommates.</p>
                </div>
                <a href="{{ route('colocation.create') }}" class="btn-primary w-fit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create Colocation
                </a>
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/50 rounded-xl flex items-center gap-3 animate-slide-up">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-800">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200/50 rounded-xl flex items-center gap-3 animate-slide-up">
                    <div class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-red-800">{{ session('error') }}</p>
                </div>
            @endif

            @if($colocations->isEmpty())
                <div class="py-20 text-center">
                    <div class="w-20 h-20 rounded-2xl bg-slate-100 text-slate-300 mx-auto flex items-center justify-center mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">No Colocations Yet</h3>
                    <p class="text-slate-600 mb-8 max-w-md mx-auto">You aren't a member of any shared living spaces yet. Create your first colocation or join an existing one.</p>
                    <a href="{{ route('colocation.create') }}" class="btn-primary">Create Your First Space</a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($colocations as $coloc)
                    <div class="premium-card overflow-hidden flex flex-col h-full hover:shadow-[0_25px_50px_rgba(15,23,42,0.12)] transition-all duration-300 group">
                        <!-- Card Header with Status -->
                        <div class="p-6 pb-4 border-b border-slate-200/50 flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <h2 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-primary-600 transition-colors">{{ $coloc->name }}</h2>
                                <div class="flex items-center gap-2 text-sm text-slate-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="font-medium">{{ $coloc->owner->name }}</span>
                                </div>
                            </div>
                            <span class="badge {{ $coloc->status == 'active' ? 'badge-success' : 'badge-danger' }} whitespace-nowrap">
                                {{ ucfirst($coloc->status) }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="flex-grow p-6 space-y-4">
                            <!-- Stats -->
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-slate-50 rounded-lg text-sm font-semibold text-slate-700">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>{{ $coloc->users->count() }} Members</span>
                            </div>

                            <!-- Members List -->
                            <div class="space-y-2">
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Members</p>
                                <div class="space-y-2">
                                    @forelse($coloc->users as $member)
                                        <div class="flex items-center justify-between p-3 rounded-lg bg-slate-50 hover:bg-slate-100 transition-colors">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary-500 to-primary-600 text-white flex items-center justify-center font-bold text-xs flex-shrink-0">
                                                    {{ substr($member->name, 0, 1) }}
                                                </div>
                                                <div class="min-w-0">
                                                    <p class="text-sm font-semibold text-slate-900 truncate">{{ $member->name }}</p>
                                                    <p class="text-xs text-slate-500 font-medium">{{ ucfirst($member->pivot->role) }}</p>
                                                </div>
                                            </div>
                                            
                                            @if($coloc->owner_id == Auth::id() && $member->id != $coloc->owner_id)
                                                <form action="{{ route('colocation.remove-member', [$coloc, $member->id]) }}" method="POST" class="inline">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-1.5 text-slate-300 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" onclick="return confirm('Remove this member?')" title="Remove member">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @empty
                                        <p class="text-sm text-slate-500 italic py-2">No other members yet</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer Actions -->
                        <div class="p-6 border-t border-slate-200/50 space-y-3">
                            @if($coloc->owner_id == Auth::id())
                                <div class="grid grid-cols-2 gap-3">
                                    @if($coloc->status == 'active')
                                        <form action="{{ route('update-colocation-status', $coloc) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="w-full btn-secondary !py-2 !text-xs !font-semibold">
                                                Deactivate
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('update-colocation-status', $coloc) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="active">
                                            <button type="submit" class="w-full btn-secondary !py-2 !text-xs !font-semibold">
                                                Activate
                                            </button>
                                        </form>
                                    @endif

                                    <button type="button" class="invite_member_btn w-full btn-primary !py-2 !text-xs !font-semibold">
                                        Invite
                                    </button>
                                </div>

                                <div class="flex gap-3">
                                    <a href="{{ route('colocation.edit', $coloc) }}" class="flex-1 btn-secondary !py-2.5 !text-xs !font-semibold text-center">
                                        Edit
                                    </a>
                                    <form action="{{ route('colocation.delete', $coloc) }}" method="POST" class="flex-1">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-full btn-secondary !py-2.5 !text-xs !font-semibold text-red-600 hover:text-red-700 hover:bg-red-50" onclick="return confirm('Delete this colocation permanently?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>

                                <!-- Invitation Modal -->
                                <div id="invite_modal_{{ $coloc->id }}" class="invite_modal hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
                                    <div class="premium-card !p-8 w-full max-w-md shadow-xl animate-slide-down">
                                        <div class="flex justify-between items-center mb-6">
                                            <div>
                                                <h3 class="text-xl font-bold text-slate-900">Invite Member</h3>
                                                <p class="text-xs text-slate-500 font-medium mt-1">{{ $coloc->name }}</p>
                                            </div>
                                            <button class="close_invite_modal p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-all" title="Close">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <form action="{{ route('colocation.send-invitation', $coloc) }}" method="post" class="space-y-4">
                                            @csrf
                                            <div>
                                                <x-input-label for="email_{{ $coloc->id }}" :value="__('Email Address')" class="mb-2" />
                                                <x-text-input id="email_{{ $coloc->id }}" name="email" type="email" class="w-full" placeholder="user@example.com" required />
                                            </div>
                                            <x-primary-button class="w-full !py-3">
                                                {{ __('Send Invitation') }}
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="p-3 bg-slate-50 rounded-lg text-center">
                                    <p class="text-xs font-semibold text-slate-600">Member View</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle invitation modals
            const cards = document.querySelectorAll('.premium-card');
            cards.forEach(card => {
                const inviteBtn = card.querySelector('.invite_member_btn');
                const modal = card.querySelector('.invite_modal');
                const closeBtn = card.querySelector('.close_invite_modal');

                if (inviteBtn && modal) {
                    inviteBtn.onclick = () => {
                        modal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    };

                    closeBtn.onclick = () => {
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    };

                    // Close on outside click
                    modal.onclick = (e) => {
                        if (e.target === modal) {
                            modal.classList.add('hidden');
                            document.body.style.overflow = 'auto';
                        }
                    };
                }
            });

            // Auto-hide session messages
            const alerts = document.querySelectorAll('.animate-slide-up');
            if (alerts.length > 0) {
                setTimeout(() => {
                    alerts.forEach(alert => {
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateY(-10px)';
                        setTimeout(() => alert.remove(), 300);
                    });
                }, 5000);
            }
        });
    </script>
@endsection
