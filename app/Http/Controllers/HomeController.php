<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {
        $settings = Setting::orderBy('created_at','desc')->get();
        return view('welcome', compact('settings'));
    }


    public function index()
    {
        if (Auth::check()) {
            //for admin
            return view('admin.welcome');

        }else{

            return view('login');
        }
    }
    // public function gethome()
    // {
    //     if (Auth::check()) {
    //         return view('admin.dashboard');
    //     } else {
    //         return view('auth.login');
    //     }
    // }
}
