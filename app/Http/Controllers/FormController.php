<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Mail\FormEMail;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function index()
    {
        return view('form.form');
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
}
