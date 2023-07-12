<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {
        return view('welcome');
    }


    public function index()
    {
        if (Auth::check()) {
            //for admin
            return view('admin.welcome');

        }
        return view('auth.login');
    }
}
