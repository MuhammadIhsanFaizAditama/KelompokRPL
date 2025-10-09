<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        $request->validate([
            // 'name' => 'required|name|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:50'
        ]);
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect('/dashboard');
        }
        return redirect()->route('login.submit')->with('error', 'Login Gagal');
    }

    public function logout()
    {
        Auth::login(Auth::user());
        return redirect('/login');
    }
}
