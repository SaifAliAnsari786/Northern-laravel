<?php

namespace App\Http\Controllers;

use App\Mail\NdsEmail;
// use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Setting;
use App\Models\WorkingAtNds;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;


class WorkingAtNdsController extends Controller
{
    public function index()
    {
        $settings  = Setting::all();
        $working_nds_image = $settings->where('slug', 'working-nds')->first();
        $working_nds_description = $settings->where('slug', 'working-nds-description')->first();
        return view('working_at_nds.working_at_nds',compact('working_nds_image','working_nds_description'));
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
