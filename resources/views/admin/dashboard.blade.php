
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
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

    <!-- Main Content -->
    <main class="flex-1 p-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
            <p class="text-gray-600 mt-2">Manage users, colocations, and expenses</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Users</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
                </div>
                <div class="text-blue-500 text-4xl">👥</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Admins</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $adminUsers }}</p>
                </div>
                <div class="text-purple-500 text-4xl">⚙️</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Colocations</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalColocations }}</p>
                </div>
                <div class="text-green-500 text-4xl">🏠</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Expenses</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalExpenses }}</p>
                </div>
                <div class="text-orange-500 text-4xl">💰</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Amount</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalAmount }} DH</p>
                </div>
                <div class="text-orange-500 text-4xl">💰</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium"> Amount Paid</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalAmountPaid }} DH</p>
                </div>
                <div class="text-orange-500 text-4xl">💰</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium"> Amount Unpaid</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalAmountUnpaid }} DH</p>
                </div>
                <div class="text-orange-500 text-4xl">💰</div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Banned Users</p>
                    <p class="text-3xl font-bold text-red-600">{{ $bannedUsers }}</p>
                </div>
                <div class="text-red-500 text-4xl">🚫</div>
            </div>
        </div>

        <!-- Management Links -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <a href="{{ route('admin.users.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow p-6 transition">
                <h3 class="text-lg font-bold mb-2">Manage Users</h3>
                <p class="text-blue-100 text-sm">Edit roles, ban users, and manage permissions</p>
            </a>
            <a href="{{ route('admin.colocations.index') }}" class="bg-green-600 hover:bg-green-700 text-white rounded-lg shadow p-6 transition">
                <h3 class="text-lg font-bold mb-2">Manage Colocations</h3>
                <p class="text-green-100 text-sm">View all colocations and their details</p>
            </a>
            <a href="{{ route('admin.expenses.index') }}" class="bg-orange-600 hover:bg-orange-700 text-white rounded-lg shadow p-6 transition">
                <h3 class="text-lg font-bold mb-2">Manage Expenses</h3>
                <p class="text-orange-100 text-sm">View and manage all expenses in the system</p>
            </a>
        </div>

        <!-- Recent Users -->
        <div class="bg-white rounded-lg shadow mb-8 overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($recentUsers as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $user->is_banned ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $user->is_banned ? 'Banned' : 'Active' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Recent Colocations -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Owner</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Members</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($recentColocations as $colocation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $colocation->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $colocation->owner->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $colocation->users->count() }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $colocation->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($colocation->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $colocation->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</body>
</html>