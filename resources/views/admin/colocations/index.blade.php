<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
    
 <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Admin Panel
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                Users
            </a>
            <a href="{{ route('admin.colocations.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.colocations.*') ? 'bg-gray-700' : '' }}">
                Colocations
            </a>
            <a href="{{ route('admin.expenses.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.expenses.*') ? 'bg-gray-700' : '' }}">
                Expenses
            </a>
        </nav>
    </aside>
<div class="bg-white rounded-lg shadow overflow-hidden flex-1 p-8">
    <!-- Table Header -->
    <div class="flex justify-between items-center mb-4 p-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manage Colocations</h1>
            <p class="text-gray-600 mt-1">View all active colocations in the system</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
            Back to Dashboard
        </a>
    </div>

    <!-- Colocations Table -->
    <div class="overflow-x-auto">
        <table class="w-full min-w-[700px]">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Owner</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Members</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Updated</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($colocations as $colocation)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $colocation->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $colocation->owner->name ?? 'N/A' }}<br>
                        <span class="text-xs text-gray-500">{{ $colocation->owner->email ?? '' }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $colocation->users->count() }} member(s)
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $colocation->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($colocation->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $colocation->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $colocation->updated_at->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-600">No colocations found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $colocations->links() }}
    </div>
</div>

</body>
</html>