<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {
        $sliders = Slider::all();
        $services = Service::all();
        $settings  = Setting::all();
        $authorization_top_image = $settings->where('slug', 'authorization-top-image')->first();
        $authorization_right_image = $settings->where('slug', 'authorization')->first();
        $authorization_description = $settings->where('slug', 'authorization-description')->first();
        $northern_disability_service = $settings->where('slug', 'northern-disability-services')->first();
        $northern_disability_service_image = $settings->where('slug', 'northern-disability-services-image')->first();
        $ndis_pricing_image = $settings->where('slug', 'ndis-pricing-image')->first();
        $ndis_pricing = $settings->where('slug', 'ndis-pricing')->first();

        return view('welcome', compact('authorization_top_image', 'authorization_right_image', 'authorization_description',
                                'northern_disability_service', 'northern_disability_service_image','ndis_pricing_image','ndis_pricing','sliders'));
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
