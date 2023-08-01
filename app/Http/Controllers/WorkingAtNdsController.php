<?php

namespace App\Http\Controllers;

use App\Models\WorkingAtNds;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;


class WorkingAtNdsController extends Controller
{
    public function index()
    {
        return view('working_at_nds.working_at_nds');
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
        return redirect('workingatNDS');
    }

}
