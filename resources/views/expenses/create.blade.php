<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Expense</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex bg-gray-100">
    @include('components.dashboard-side-bar')


    <div class="  bg-white text-black p-8 rounded-lg shadow w-[90%] ">
        <div>
            <h1 class="text-2xl font-bold mb-6 bgtext-green-800">Create Expense</h1>

            <form action="{{ route('expenses.store') }}" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="title" placeholder="Title" class="w-full border p-3 rounded" required>

                <input type="number" step="0.01" name="amount" placeholder="Amount" class="w-full border p-3 rounded" required>

                <input type="date" name="expense_date" class="w-full border p-3 rounded" required>

                @if($colocation)
                <input type="hidden" name="colocation_id" value="{{ $colocation->id }}">
                @endif

                <select name="payer_id" class="w-full border p-3 rounded" required>
                    <option value="">Select Payer</option>

                    @foreach($colocation->users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <select name="category_id" class="w-full border p-3 rounded" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <button class="bg-green-800 text-white px-6 py-3 rounded-lg w-full">
                    Save
                </button>
            </form>
        </div>
    </div>

</body>

</html>