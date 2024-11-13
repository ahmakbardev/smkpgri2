<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // Authentication successful
            return redirect()->intended('/dashboard');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login-admin');
    }
}
