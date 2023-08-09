<?php

namespace App\Http\Controllers;

use App\Mail\NdsEmail;
// use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Setting;
use App\Models\WorkingAtNds;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

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
        $validatedData = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required|numeric',
            'check' => 'required',
            'message' => 'required',
            'image' => 'required|mimes:png,jpg,pdf',

        ]);
        if (request()->hasFile('image')) {
            $extension = request('image')->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $extension;
            $path = 'images/workingAtNds/';
            request('image')->move($path, $fileName);
            $validatedData['image'] = $path.$fileName;
        }
        // Checkboxes (Replace 'option1', 'option2', 'option3' with your actual checkbox values)
        $check = request()->input('check', []);
        $validatedData['check'] = implode(',', $check); // Convert the array to a comma-separated strin
        $setting =  WorkingAtNds::create($validatedData);
        Mail::to('saifaliansari477@gmail.com')->send(new NdsEmail($setting));
        return redirect('workingatNDS');
    }


    public function getworkingatNDS()
    {
        $workingndss = WorkingAtNds::all();
        return view('admin.working_nds_form.index',compact('workingndss'));
    }

    public function show($id)
    {
        $workingnds = WorkingAtNds::findOrFail($id);
        return view('admin.working_nds_form.show', compact('workingnds'));

    }

    public function destroy($id)
    {
        $workingnds = WorkingAtNds::findOrFail($id);

        $workingnds->delete();
        Session::flash('success', 'Form has been deleted!');
        return redirect()->back();

    }

}
