<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/colocations', [ColocationController::class, 'index'])->name('colocations.index');
    Route::get('/colocations/create', [ColocationController::class, 'create'])->name('colocation.create');
    Route::post('/colocations/store', [ColocationController::class, 'store'])->name('colocation.store');
    Route::get('/colocations/edit/{colocation}', [ColocationController::class, 'edit'])->name('colocation.edit');
    Route::put('/colocations/update/{colocation}', [ColocationController::class, 'update'])->name('colocation.update');
    Route::delete('/colocations/delete/{colocation}', [ColocationController::class, 'destroy'])->name('colocation.delete');
    Route::put('/colocations/update-status/{colocation}', [ColocationController::class, 'updateColocationStatus'])->name('update-colocation-status');
    Route::post('/invitation/{colocation}', [InvitationController::class, 'sendInvitation'])->name('colocation.send-invitation');
    Route::get('/invitation/{token}', [InvitationController::class, 'acceptInvitation'])->name('accept-ivitation');
    Route::delete('/colocations/{colocation}/members/{user}', [ColocationController::class, 'removeMember'])->name('colocation.remove-member');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');
Route::get('/expenses/create', [ExpensesController::class, 'create'])->name('expenses.create');
Route::post('/expenses', [ExpensesController::class, 'store'])->name('expenses.store');
Route::get('/expenses/{expense}', [ExpensesController::class, 'show'])->name('expenses.show');
Route::get('/expenses/{expense}/edit', [ExpensesController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/{expense}', [ExpensesController::class, 'update'])->name('expenses.update');
Route::delete('/expenses/{expense}', [ExpensesController::class, 'destroy'])->name('expenses.destroy');
Route::put('/payments/{payment}/mark-paid', [PaymentsController::class, 'markPaid'])->name('payments.markPaid');
});

require __DIR__ . '/auth.php';
