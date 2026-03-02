<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" flex bg-gray-100 min-h-screen">
       @include('components.dashboard-side-bar')
    <div class="w-[90%] p-12">

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Categories</h1>

        @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" class="flex gap-2 mb-6">
            @csrf
            <input type="text" name="name" placeholder="Category name" class="border px-3 py-2 rounded flex-1">
            <select name="colocation_id" class="border px-3 py-2 rounded">
                @foreach($colocations as $coloc)
                    <option value="{{ $coloc->id }}">{{ $coloc->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add</button>
        </form>

        <table class="w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-400 px-2 py-1 rounded text-white">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-2 py-1 rounded text-white">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-red-500 p-4">No categories found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</body>
</html>