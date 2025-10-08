<?php

use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/landing', function () {
    return view('landing');
});

// Register page
Route::get('/register', function () {
    return view('register');
})->name('register');

// Login page
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route untuk menangani register POST
Route::post('/register', function (\Illuminate\Http\Request $request) {
    // Simulasi penyimpanan user
    // Biasanya disini pakai User::create([...]) jika pakai DB
    return redirect()->route('dashboard');
})->name('register.submit');

// Route untuk menangani login POST
Route::post('/login', function (\Illuminate\Http\Request $request) {
    // Simulasi login valid
    // Biasanya disini pakai Auth::attempt([...])
    return redirect()->route('dashboard');
})->name('login.submit');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
