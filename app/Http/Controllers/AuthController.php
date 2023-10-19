<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login/pages/login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credential)) {
            # code...
            return redirect()->intended('home');
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'Berhasil logout.');
    }
}
