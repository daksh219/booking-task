<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verify.email');

Route::middleware('check.auth')->group(function () {
    
    Route::get('/booking', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('bookings.store');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

