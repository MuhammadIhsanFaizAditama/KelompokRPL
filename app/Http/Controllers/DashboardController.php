<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // 🔹 Dashboard untuk admin
    public function admin()
    {
        // Cek apakah user sudah login dan role-nya admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.dashboard', [
                'user' => Auth::user()
            ]);
        }

        // Jika bukan admin, kembalikan ke dashboard student
        return redirect()->route('student.dashboard');
    }

    // 🔹 Dashboard untuk student
    public function student()
    {
        // Cek apakah user sudah login dan role-nya student
        if (Auth::check() && Auth::user()->role === 'student') {
            return view('student.dashboard', [
                'user' => Auth::user()
            ]);
        }

        // Jika bukan student, kembalikan ke dashboard admin
        return redirect()->route('student.dashboard');
    }
}
