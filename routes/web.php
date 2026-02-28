<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;
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
});

require __DIR__ . '/auth.php';
