<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

// --- REDIRECT HALAMAN UTAMA ---
Route::get('/', function () {
    return redirect()->route('login');
});

// --- GUEST ROUTES ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('login.post');
});

// --- AUTHENTICATED ROUTES ---
Route::middleware('auth')->group(function () {
    
    // Dashboard & Logout
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route Halaman Tentang Saya
    Route::get('/tentang-saya', function () {
        return view('tentang-saya');
    })->name('tentang-saya');

    // --- KHUSUS ADMIN ---
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');  
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // --- ADMIN & KASIR ---
    Route::resource('produk', ProdukController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('itempenjualan', ItemPenjualanController::class);

});