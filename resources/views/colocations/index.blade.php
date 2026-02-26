<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">My Colocations</h1>
        @if(session('success'))
        <div class=" response_message bg-green-500 text-white p-3 rounded-xl mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class=" response_message bg-red-500 text-white p-3 rounded-xl mb-4">
            {{ session('error') }}
        </div>
        @endif
        <div class="grid md:grid-cols-3 gap-6 mt-4">
            @foreach($colocations as $coloc)
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100 hover:shadow-2xl transition">

                 
                <span class="inline-block px-4 py-1 text-sm rounded-full bg-green-500 text-white font-semibold">
                    {{$coloc->status}}
                </span>
                 <span class="inline-block px-4 py-1 text-sm rounded-full bg-blue-500 text-white font-semibold">
                    members:{{$coloc->users->count()}}
                </span>
                
                   @if($coloc->status == 'active')
                     <form action="{{ route('update-colocation-status', $coloc) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit" class="flex-1 text-center bg-red-400 p-1 hover:bg-red-500 text-white py-2 rounded-xl font-semibold transition">Cancel</button>
                    </form>
                    @else 
                    <form action="{{ route('update-colocation-status', $coloc) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="active">
                        <button type="submit" class="flex-1 text-center bg-blue-400 p-1 hover:bg-red-500 text-white py-2 rounded-xl font-semibold transition">Active</button>
                    </form>
                    @endif

                <h2 class="mt-4 text-xl font-bold text-gray-800">
                    {{$coloc->name}}
                </h2>


                <p class="text-gray-500 mt-2 text-sm">
                    Owner: <span class="font-semibold text-gray-700">{{$coloc->owner->name}}</span>
                </p>

                @foreach($coloc->users as $member)
                 <p>{{$member->name}}</p>
                 @endforeach
                <div class="flex gap-3 mt-6">
                    <a href="{{route('colocation.edit',$coloc)}}"
                        class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 rounded-xl font-semibold transition">
                        Edit
                    </a>

                    <form action="{{ route('colocation.delete', $coloc) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex-1 text-center bg-red-400 p-1 hover:bg-red-500 text-white py-2 rounded-xl font-semibold transition">Delete</button>
                    </form>
                </div>
                <button type="button"
                    class="invite_member_btn mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold transition">
                    Invite Members
                </button>

            </div>
            @endforeach
        </div>


    </div>


    <div id="invite_member_form"
        class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 relative">


            <button id="close_invite_modal"
                class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-lg font-bold">
                ✕
            </button>

            <h2 class="text-xl font-bold mb-6 text-gray-800">Invite Members</h2>

            <form action="" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Member Email
                    </label>
                    <input type="email" name="email"
                        placeholder="member@coloc.com"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold transition">
                    Send Invitation
                </button>
            </form>

        </div>
    </div>

</body>

</html>
<script>
    const inviteMemberForm = document.getElementById('invite_member_form')
    const showFormModalBtn = document.querySelectorAll('.invite_member_btn')
    const closeFormModalBtn = document.getElementById('close_invite_modal')

    function showFormModal() {
        showFormModalBtn.forEach(btn => btn.addEventListener('click', () => {
            inviteMemberForm.classList.remove('hidden')
        }))
    }

    function hideFormModal() {
        closeFormModalBtn.addEventListener('click', () => {
            inviteMemberForm.classList.add('hidden')
        })
    }

    function hideResponseMesagess() {
        const responseMessage = document.querySelectorAll('.response_message');
        setTimeout(() => {
            responseMessage.forEach(msg => msg.classList.add('hidden'))
        }, 3000)
    }

    showFormModal();
    hideFormModal();
    hideResponseMesagess();
</script>