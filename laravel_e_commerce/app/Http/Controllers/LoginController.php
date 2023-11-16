<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user->isActive) {
                if ($user->role === 'superadmin') {
                    return redirect()->route('superadmin');
                } else if ($user->role === 'admin') {
                    return redirect()->route('admin');
                } else if ($user->role === 'user') {
                    return redirect()->route('user');
                }
            }

            return back()->withErrors([
                'email' => 'Your account is blocked.',
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
