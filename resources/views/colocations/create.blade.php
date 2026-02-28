<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Colocation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Create Colocation</h1>

        <form action="{{ route('colocation.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Colocation Name</label>
                <input type="text" name="name" id="name" placeholder="Colocation name"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white py-2.5 rounded-xl font-semibold transition">
                Create
            </button>
        </form>

    </div>

</body>
</html>