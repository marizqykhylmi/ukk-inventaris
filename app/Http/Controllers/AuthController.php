<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = auth::user();

        if ($user->role == 'admin') {
            return redirect('/admin');
        }

        return redirect('/operator/dashboard');
    }

    return back()->with('error', 'Email atau password salah');
}


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
