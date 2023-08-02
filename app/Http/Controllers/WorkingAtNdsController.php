<?php

namespace App\Http\Controllers;

use App\Mail\NdsEmail;
// use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WorkingAtNds;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;


class WorkingAtNdsController extends Controller
{
    // public function index()
    // {
    //     return view('working_at_nds.working_at_nds');
    // }
    public function index($slug)
    {
    // Find the Service record by slug
        $setting = Service::where('slug', $slug)->first();
        if ($setting) {
            if ($setting->serviceDescriptions()->exists()) {
                $serviceDescriptions = $setting->serviceDescriptions;
                return view('working_at_nds.working_at_nds', compact('setting', 'serviceDescriptions'));
            } else {
                return view('working_at_nds.working_at_nds', compact('setting'));
            }
        } else {
            abort(404);
        }
    }

    public function store()
    {
        $setting = request()->all();
        if (request()->hasFile('image')) {
            $extension = request('image')->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $extension;
            $path = 'images/workingAtNds/';
            request('image')->move($path, $fileName);
            $setting['image'] = $path.$fileName;
        }
        // Checkboxes (Replace 'option1', 'option2', 'option3' with your actual checkbox values)
        $check = request()->input('check', []);
        $setting['check'] = implode(',', $check); // Convert the array to a comma-separated strin
        WorkingAtNds::create($setting);
        Mail::to('saifaliansari477@gmail.com')->send(new NdsEmail($setting));
        return redirect('workingatNDS');
    }



}
