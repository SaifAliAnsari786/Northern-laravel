<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceFormStoreRequest;
use App\Models\Slider;
use App\Models\Service;
use App\Models\ServiceForm;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\ServiceDescription;
use Illuminate\Support\Facades\Auth;
use App\Mail\ServiceMail;
use Illuminate\Support\Facades\Mail;
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
        $empowerment_image = $settings->where('slug', 'empowerment')->first();
        $empowerment_description = $settings->where('slug', 'empowerment-description')->first();
        $integrity_image = $settings->where('slug', 'integrity')->first();
        $integrity_description = $settings->where('slug', 'integrity-description')->first();
        $inclusiveness_image = $settings->where('slug', 'inclusiveness')->first();
        $inclusiveness_description = $settings->where('slug', 'inclusiveness-description')->first();
        $country = $settings->where('slug', 'country')->first();
        $country_logo = $settings->where('slug', 'country-logo')->first();
        $acknowledgement_country = $settings->where('slug', 'acknowledgement-of-country')->first();
        return view('about.about',compact('northern_disability_service','nds_description','empowerment_image','empowerment_description',
                                    'integrity_image','integrity_description','inclusiveness_image','inclusiveness_description','country','country_logo','acknowledgement_country'));
    }

    public function store(ServiceFormStoreRequest $request)
    {
        $data = $request->all();

        $serviceforms = ServiceForm::create($data);
        Mail::to('kritimstha2015@gmail.com')->send(new ServiceMail($data));
        if ($serviceforms) {
            return redirect()->back();
        }
    }

    public function gallery()
    {
        $gallery = Service::all();
        $respite_care = $gallery->where('slug', 'respite-care')->first();
        $daily_living_support = $gallery->where('slug', 'daily-living-support')->first();
        $support_coordination = $gallery->where('slug', 'support-coordination')->first();

        return view('gallery.gallery',compact('gallery','respite_care','daily_living_support','support_coordination'));
    }

    public function servicefooter()
    {
        $services = Service::where('status', 1)->orderBy('id', 'ASC')->get();

        return view('service_footer.index',compact('services'));
    }
}

