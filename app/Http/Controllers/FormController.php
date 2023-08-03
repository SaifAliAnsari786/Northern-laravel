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
        $form = request()->all();

        if (request()->hasFile('image')) {
            $extension = request('image')->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $extension;
            $path = 'images/forms/';
            request('image')->move($path, $fileName);
            $form['image'] = $path.$fileName;
        }
       
        $core_support = request()->input('core_support', []);
        $form['core_support'] = implode(',', $core_support); 

        $capacity_building_supports = request()->input('capacity_building_supports', []);
        $form['capacity_building_supports'] = implode(',', $capacity_building_supports);

        $coordination = request()->input('coordination', []);
        $form['coordination'] = implode(',', $coordination);

        $plan_management = request()->input('plan_management', []);
        $form['plan_management'] = implode(',', $plan_management);

        Form::create($form);
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
