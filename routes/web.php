<?php

use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Guest-only routes (only accessible if NOT logged in)
Route::middleware('guest')->group(function () {
    // Customer Registration
    Route::get('/register/customer', [CustomerRegisterController::class, 'showForm'])->name('customer.register');
    Route::post('/register/customer', [CustomerRegisterController::class, 'register']);

    // Admin Registration
    Route::get('/register/admin', [AdminRegisterController::class, 'showForm'])->name('admin.register');
    Route::post('/register/admin', [AdminRegisterController::class, 'register']);

    // Email Verification
    Route::get('/verify-email', [VerificationController::class, 'showForm'])->name('verification.form');
    Route::post('/verify-email', [VerificationController::class, 'verify'])->name('verification.verify');

    // Login/Logout
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated-only routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
