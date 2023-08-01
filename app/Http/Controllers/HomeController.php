<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\ServiceDescription;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {
        $sliders = Slider::all();
        $settings  = Setting::all();
        $services = Service::where('status', 1)->orderBy('id', 'ASC')->get();
        $authorization_top_image = $settings->where('slug', 'authorization-top-image')->first();
        $authorization_right_image = $settings->where('slug', 'authorization')->first();
        $authorization_description = $settings->where('slug', 'authorization-description')->first();
        $northern_disability_service = $settings->where('slug', 'northern-disability-services')->first();
        $northern_disability_service_image = $settings->where('slug', 'northern-disability-services-image')->first();
        $ndis_pricing_image = $settings->where('slug', 'ndis-pricing-image')->first();
        $ndis_pricing = $settings->where('slug', 'ndis-pricing')->first();
        return view('welcome', compact('authorization_top_image', 'authorization_right_image', 'authorization_description',
                                'northern_disability_service', 'northern_disability_service_image','ndis_pricing_image','ndis_pricing','sliders', 'services'));
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
    public function getService($slug)
    {
        // Find the Service record by slug
    $setting = Service::where('slug', $slug)->first();
    if ($setting) {
        if ($setting->serviceDescriptions()->exists()) {
            $serviceDescriptions = $setting->serviceDescriptions;
            return view('service.service', compact('setting', 'serviceDescriptions'));
        } else {
            return view('service.service', compact('setting'));
        }
    } else {
        abort(404);
    }

    }
    public function aboutUs()
    {
        $settings  = Setting::all();
        $northern_disability_service = $settings->where('slug', 'northern-disability-services')->first();
        $nds_description = $settings->where('slug', 'nds-about')->first();
        return view('about.about',compact('northern_disability_service','nds_description'));
    }
}
