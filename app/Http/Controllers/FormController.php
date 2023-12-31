<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Mail\FormEMail;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function index()
    {
        $settings  = Setting::all();
        $enquiry = $settings->where('slug', 'enquiry-form')->first();
        $enquiry_description = $settings->where('slug', 'enquiry')->first();
        return view('form.form',compact('enquiry','enquiry_description'));
    }

    public function store()
    {
        $validatedData = $this->validate(request(), [
            'participant_fund' => 'required',
            'enquirer_name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required|numeric',
            'participant_name' => 'required',
            'participant_age' => 'required',
            'participant_gender' => 'required',
            'participant_disability_type' => 'required',
            'participant_suburb' => 'required',
            'postcode' => 'required',
            'state' => 'required',
            'heard' => 'required',
            'core_support' => 'required',
            'capacity_building_supports' => 'required',
            'coordination' => 'required',
            'plan_management' => 'required',
            'image' => 'required|mimes:png,jpg,pdf',
            'message' => 'required',

        ]);

        if (request()->hasFile('image')) {
            $extension = request('image')->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $extension;
            $path = 'images/forms/';
            request('image')->move($path, $fileName);
            $validatedData['image'] = $path.$fileName;
        }

        $core_support = request()->input('core_support', []);
        $validatedData['core_support'] = implode(',', $core_support);

        $capacity_building_supports = request()->input('capacity_building_supports', []);
        $validatedData['capacity_building_supports'] = implode(',', $capacity_building_supports);

        $coordination = request()->input('coordination', []);
        $validatedData['coordination'] = implode(',', $coordination);

        $plan_management = request()->input('plan_management', []);
        $validatedData['plan_management'] = implode(',', $plan_management);

       $form = Form::create($validatedData);
        Mail::to('kritimstha2015@gmail.com')->send(new FormEMail($form));
        return redirect('form');
    }

    public function getform()
    {
        $forms = Form::all();
        return view('admin.enquiry_form.index',compact('forms'));
    }

    public function show($id)
    {
        $forms = Form::findOrFail($id);
        return view('admin.enquiry_form.show', compact('forms'));

    }

    public function destroy($id)
    {
        $forms = Form::findOrFail($id);

        $forms->delete();
        Session::flash('success', 'Form has been deleted!');
        return redirect()->back();

    }
}
