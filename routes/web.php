<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminMaterialController;
use App\Http\Controllers\AdminUserController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// === Auth Routes ===
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// === Dashboard Student & Course Routes ===
Route::prefix('student')->name('student.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');

    // Daftar kursus
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');

    // Materi kursus
    Route::get('/courses/{course}/materials', [CourseController::class, 'materials'])->name('courses.materials');

// 👇 Tambahkan route ini
    Route::get('/courses/{course}/materials/{material}', [CourseController::class, 'showMaterial'])
        ->name('courses.materials.show');

    // Ikuti kursus
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

    // Batal ikut kursus
    Route::delete('/courses/{course}/unenroll', [CourseController::class, 'unenroll'])->name('courses.unenroll');
});

// === Admin Routes ===
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // CRUD Courses (Admin)
    Route::resource('courses', AdminCourseController::class);

    // Nested CRUD Materials per Course (Admin)
    Route::prefix('courses/{course}')->name('courses.')->group(function () {
        Route::resource('materials', AdminMaterialController::class);
    });

    // Route khusus untuk menampilkan semua materi (tanpa filter course)
    Route::get('materials', [AdminMaterialController::class, 'allMaterials'])
        ->name('materials.index.all');

    // CRUD Users (Admin)
    Route::resource('users', AdminUserController::class);

    // Route::get('/admin/reports', [AdminController::class, 'reports'])->name('reports');

});

