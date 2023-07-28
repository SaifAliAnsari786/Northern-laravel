<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function store(Request $request)
    {
        $name = 'saif';
        $setting = request()->all();
        $contact = Contact::create($setting);
        Mail::to('saifaliansari477@gmail.com')->send(new ContactEmail($name));
        if ($contact) {
            return redirect('contact');
        }
    }
}
