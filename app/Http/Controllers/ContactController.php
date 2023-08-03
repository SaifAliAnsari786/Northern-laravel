<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $settings  = Setting::all();
        $contact_image = $settings->where('slug', 'contact')->first();
        $contact_description = $settings->where('slug', 'contactdescription')->first();
        return view('contact.contact',compact('contact_image','contact_description'));
    }

    public function store(Request $request)
    {
        $setting = request()->all();
        $contact = Contact::create($setting);
        Mail::to('saifaliansari477@gmail.com')->send(new ContactEmail($setting));
        if ($contact) {
            return redirect('contact');
        }
    }

    public function getcontact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));

    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
       
        $contact->delete();
        Session::flash('success', 'Service has been deleted!');
        return redirect()->back();
    
    }
}
