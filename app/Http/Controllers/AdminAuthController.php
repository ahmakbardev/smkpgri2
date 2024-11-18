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

        // Check if login attempt is for admin
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            return redirect()->intended('/dashboard');
        }

        // Check if login attempt is for user (penulis)
        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user();

            if ($user->role === 'Penulis') { // Role check
                return redirect()->intended('/penulis/dashboard'); // Redirect to penulis dashboard
            }
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
