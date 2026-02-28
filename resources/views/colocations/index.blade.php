<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Colocations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-green-800 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold flex items-center gap-3 border-b border-green-700">
            <i class="fa-solid fa-house"></i> Dashboard
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('colocations.index') }}" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-users mr-2"></i> My Colocations
            </a>
            <a href="{{ route('colocation.create') }}" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-plus mr-2"></i> Create Colocation
            </a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-envelope mr-2"></i> Invitations
            </a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-gear mr-2"></i> Settings
            </a>
        </nav>
        <div class="p-4 border-t border-green-700">
            Logged in as <span class="font-semibold">{{ Auth::user()->name }}</span>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-10">
        <h1 class="text-4xl font-extrabold mb-10 text-gray-800 flex items-center gap-3">
            <i class="fa-solid fa-house text-green-500"></i>
            My Colocations
        </h1>

        @if(session('success'))
        <div class="response_message bg-green-500 text-white p-3 rounded-xl mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="response_message bg-red-500 text-white p-3 rounded-xl mb-4">
            {{ session('error') }}
        </div>
        @endif

        <div class="grid md:grid-cols-3 gap-6 mt-4">
            @foreach($colocations as $coloc)
            <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100 relative overflow-hidden">

                <div class="flex justify-between items-center mb-4">
                    <span class="px-4 py-1 text-xs font-semibold rounded-full
                        {{ $coloc->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        <i class="fa-solid fa-circle mr-1 text-[10px]"></i>
                        {{ ucfirst($coloc->status) }}
                    </span>

                    <span class="text-sm font-semibold text-green-600">
                        <i class="fa-solid fa-users mr-1"></i>
                        {{ $coloc->users->count() }}
                    </span>
                </div>

                @if($coloc->owner_id == Auth::id())
                @if($coloc->status == 'active')
                <form action="{{ route('update-colocation-status', $coloc) }}" method="POST" class="mb-3">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="cancelled">
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white py-2.5 rounded-xl font-semibold shadow-md hover:shadow-lg transition duration-200 active:scale-95">
                        <i class="fa-solid fa-ban"></i>
                        Cancel
                    </button>
                </form>
                @else
                <form action="{{ route('update-colocation-status', $coloc) }}" method="POST" class="mb-3">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="active">
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-2.5 rounded-xl font-semibold shadow-md hover:shadow-lg transition duration-200 active:scale-95">
                        <i class="fa-solid fa-rotate"></i>
                        Activate
                    </button>
                </form>
                @endif
                @endif

                <h2 class="mt-4 text-xl font-bold text-gray-800">{{ $coloc->name }}</h2>

                <p class="text-gray-500 mt-2 text-sm">
                    Owner: <span class="font-semibold text-gray-700">{{ $coloc->owner->name }}</span>
                </p>

                <span class="font-semibold text-gray-700">Members:</span>
                @forelse($coloc->users as $member)
                <div class="flex justify-between items-center mt-1">
                    <p class="text-gray-600 text-sm">{{ $member->name }}</p>
                    @if($coloc->owner_id == Auth::id() && $member->id != $coloc->owner_id)
                    <form action="{{ route('colocation.remove-member', [$coloc, $member->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-xs hover:underline">Remove</button>
                    </form>
                    @endif
                    <span class="px-4 py-1 text-xs font-semibold rounded-full
                       {{ $member->pivot->role == 'owner' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-200 text-green-900' }}">
                       {{ ucfirst($member->pivot->role) }}
                   </span>
                </div>
                @empty
                <p class="text-red-500 p-3 mb-4">No members in this colocation</p>
                @endforelse

                @if($coloc->owner_id == Auth::id())
                <div class="flex gap-3 mt-6">
                    <a href="{{ route('colocation.edit', $coloc) }}" class="flex-1 flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-white py-2 rounded-xl font-semibold transition">
                        <i class="fa-solid fa-pen"></i>
                        Edit
                    </a>
                    <form action="{{ route('colocation.delete', $coloc) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl font-semibold transition">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </div>

                <button type="button" class="invite_member_btn mt-4 w-full flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-2.5 rounded-xl font-semibold shadow-md transition">
                    <i class="fa-solid fa-user-plus"></i>
                    Invite Members
                </button>

                <div id="invite_member_form" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 relative">
                        <button id="close_invite_modal" class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-lg font-bold">✕</button>
                        <h2 class="text-xl font-bold mb-6 text-gray-800">Invite Members</h2>

                        <form action="{{ route('colocation.send-invitation', $coloc) }}" method="post" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Member Email</label>
                                <input type="email" name="email" placeholder="member@coloc.com" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none">
                            </div>
                            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-xl font-semibold transition">
                                Send Invitation
                            </button>
                        </form>
                    </div>
                </div>
                @endif

            </div>
            @endforeach
        </div>

    </main>

    <script>
        const inviteMemberForm = document.getElementById('invite_member_form');
        const showFormModalBtn = document.querySelectorAll('.invite_member_btn');
        const closeFormModalBtn = document.getElementById('close_invite_modal');

        showFormModalBtn.forEach(btn => btn.addEventListener('click', () => {
            inviteMemberForm.classList.remove('hidden');
        }));

        closeFormModalBtn.addEventListener('click', () => {
            inviteMemberForm.classList.add('hidden');
        });

        const responseMessages = document.querySelectorAll('.response_message');
        setTimeout(() => {
            responseMessages.forEach(msg => msg.classList.add('hidden'));
        }, 5000);
    </script>

</body>
</html>