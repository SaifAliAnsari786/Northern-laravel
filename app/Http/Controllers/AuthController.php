<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function gethome()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function index()
    {
        if (Auth::check()) {
            return redirect('');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        // dd(request()->all());
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
