<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function gethome()
    {
        if (Auth::check()) {
            return redirect('super-admin');
        } else {
            return view('auth.login');
        }
    }

    public function getLogin()
    {
        // if (Auth::user()) {
        //     if (Auth::user()->user_type == 1) {
        //         return redirect('super-admin');
        //     } elseif (Auth::user()->user_type == 2) {
        //         return redirect('login');
        //     }
        // }
        // return view('auth.login');
        if (Auth::check()) {
            return redirect('');
        } else {
            return view('auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
//            'captcha' => 'required|captcha',
        ]);
        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'status' => 1], request()->has('remember'))) {
            //saving in log table
            return redirect('super-admin');
        }
        return redirect('login')->withErrors(['Invalid Credentials!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
