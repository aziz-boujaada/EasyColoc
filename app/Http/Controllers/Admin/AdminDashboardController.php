<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Colocation;
use App\Models\Expense;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $totalUsers = User::count();
        $adminUsers = User::where('role', 'admin')->count();
        $totalColocations = Colocation::count();
        $totalExpenses = Expense::count();
        $bannedUsers = User::where('is_banned', true)->count();
        $totalAmount = Expense::sum('amount');
        $totalAmountPaid = Payment::whereNotNull('paid_at')->sum('amount');
        $totalAmountUnpaid = Payment::whereNull('paid_at')->sum('amount');
        $recentUsers = User::latest()->take(5)->get();
        $recentColocations = Colocation::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'adminUsers',
            'totalColocations',
            'totalExpenses',
            'totalAmount',
            'totalAmountPaid',
            'totalAmountUnpaid',
            'bannedUsers',
            'recentUsers',
            'recentColocations'
        ));
    }


    public function users()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }


    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
            'is_banned' => 'boolean',
        ]);

        $user->update($validated);


        if ($validated['is_banned'] && !$user->banned_at) {
            $user->update(['banned_at' => now()]);
        } elseif (!$validated['is_banned'] && $user->banned_at) {
            $user->update(['banned_at' => null]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }


    public function colocations()
    {
        $colocations = Colocation::with('owner', 'users')->paginate(15);
        return view('admin.colocations.index', compact('colocations'));
    }


    public function expenses()
    {
        $expenses = Expense::with('colocation', 'payer', 'category')->paginate(15);
        return view('admin.expenses.index', compact('expenses'));
    }


    public function banUser(User $user)
    {
        $user->update([
            'is_banned' => true,
            'banned_at' => now()
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User banned successfully');
    }

    public function unbanUser(User $user)
    {
        $user->update([
            'is_banned' => false,
            'banned_at' => null
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User unbanned successfully');
    }
}
