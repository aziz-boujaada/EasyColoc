<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expenses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen  text-white">
@include('components.dashboard-side-bar')
<div class="w-[90%] mx-auto p-12">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Expenses</h1>
        <a href="{{ route('expenses.create') }}" class=" bg-green-800 px-4 py-2 rounded-lg font-semibold">
            Add Expense
        </a>
    </div>

    @if(session('success'))
        <div class="bg-white text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white text-black rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">Title</th>
                    <th class="p-3 text-left">Amount</th>
                    <th class="p-3 text-left">Colocation</th>
                    <th class="p-3 text-left">Payer</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                <tr class="border-t">
                    <td class="p-3">{{ $expense->title }}</td>
                    <td class="p-3">{{ $expense->amount }} MAD</td>
                    <td class="p-3">{{ $expense->colocation->name }}</td>
                    <td class="p-3">{{ $expense->payer->name }}</td>
                    <td class="p-3">{{ $expense->expense_date }}</td>
                    <td class="p-3 text-center space-x-2">
                        <a href="{{ route('expenses.show', $expense) }}" class="text-blue-600">View</a>
                        <a href="{{ route('expenses.edit', $expense) }}" class="text-yellow-600">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</body>
</html>