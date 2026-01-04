<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Public Routes (Bisa diakses semua orang)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Buat operator pertama (Development only)
Route::get('/create-operator', [AuthController::class, 'createFirstOperator']);

// Order Routes (Public untuk create, protected untuk management)
Route::prefix('orders')->group(function () {
    // Public - bisa diakses semua orang untuk membuat pesanan
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/confirmation/{id}', [OrderController::class, 'showConfirmation'])->name('orders.confirmation');
    
    // Protected - hanya untuk operator/admin
    Route::middleware(['auth'])->group(function () {
        Route::get('/history', [OrderController::class, 'history'])->name('orders.history');
        Route::post('/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    });
});

// Dashboard Operator (Protected)
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Fallback untuk 404
Route::fallback(function () {
    return redirect()->route('home');
});
