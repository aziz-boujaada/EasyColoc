  <!-- Sidebar -->
    <aside class="w-64 bg-green-800 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold flex items-center gap-3 border-b border-green-700">
            <i class="fa-solid fa-house"></i> Dashboard
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('colocations.index') }}" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-users mr-2"></i> My Colocations
            </a>
            <a href="{{ route('expenses.index') }}" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-money mr-2"></i>  Expenses
            </a>
             <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-category mr-2"></i>  Categories
            </a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-green-700 transition">
                <i class="fa-solid fa-gear mr-2"></i> Settings
            </a>
        </nav>
        <div class="p-4 border-t border-green-700">
            Logged in as <span class="font-semibold">{{ Auth::user()->name }}</span>
        </div>
    </aside>