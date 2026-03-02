<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" flex bg-gray-100 min-h-screen">
       @include('components.dashboard-side-bar')
    <div class="w-[90%] p-12">

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Category</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="flex gap-2">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $category->name }}" class="border px-3 py-2 rounded flex-1">
            <select name="colocation_id" class="border px-3 py-2 rounded">
                @foreach($colocations as $coloc)
                    <option value="{{ $coloc->id }}" {{ $category->colocation_id == $coloc->id ? 'selected' : '' }}>
                        {{ $coloc->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>

    </div>

</body>
</html>