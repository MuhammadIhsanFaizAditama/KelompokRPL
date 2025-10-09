<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('Dashboard.landing');
})->name('landing');

Route::get('landing', function () {
    return view('Dashboard.landing');
});

// Register page
Route::get('/register', function () {
    return view('Login.register');
})->name('register');

// Login page
Route::get('/login', function () {
    return view('Login.login');
})->name('login');

// // Route untuk menangani register POST
// Route::post('/register', function (\Illuminate\Http\Request $request) {
//     // Simulasi penyimpanan user
//     // Biasanya disini pakai User::create([...]) jika pakai DB
//     return redirect()->route('dashboard.dashboard');
// })->name('register.submit');

// // Route untuk menangani login POST
// Route::post('/login', function (\Illuminate\Http\Request $request) {
//     // Simulasi login valid
//     // Biasanya disini pakai Auth::attempt([...])
//     return redirect()->route('login.dashboard');
// })->name('login.submit');

Route::post('/login', [AuthController::class, 'proseslogin'])->name('login.submit');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');
