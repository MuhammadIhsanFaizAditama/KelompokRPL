<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (pakai middleware auth)
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->name('admin.dashboard')
    ->middleware('auth');

Route::get('/student/dashboard', [DashboardController::class, 'student'])
    ->name('student.dashboard')
    ->middleware('auth');
