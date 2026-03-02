<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Expense</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" min-h-screen flex  text-white">
@include('components.dashboard-side-bar')
<div class="bg-white text-black p-8 rounded-lg shadow w-[90%] ">

    <h1 class="text-2xl font-bold mb-6 text-green-800">Edit Expense</h1>

    <form action="{{ route('expenses.update', $expense) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $expense->title }}" class="w-full border p-3 rounded" required>

        <input type="number" step="0.01" name="amount" value="{{ $expense->amount }}" class="w-full border p-3 rounded" required>

        <input type="date" name="expense_date" value="{{ $expense->expense_date }}" class="w-full border p-3 rounded" required>

        <select name="colocation_id" class="w-full border p-3 rounded" required>
            @foreach($colocations as $colocation)
                <option value="{{ $colocation->id }}" {{ $expense->colocation_id == $colocation->id ? 'selected' : '' }}>
                    {{ $colocation->name }}
                </option>
            @endforeach
        </select>

        <select name="payer_id" class="w-full border p-3 rounded" required>
            @foreach($colocations as $colocation)
                @foreach($colocation->users as $user)
                    <option value="{{ $user->id }}" {{ $expense->payer_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            @endforeach
        </select>

        <select name="category_id" class="w-full border p-3 rounded" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $expense->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button class="bg-green-800 text-white px-6 py-3 rounded-lg w-full">
            Update
        </button>
    </form>

</div>

</body>
</html>