<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    protected $view = 'admin.service.';
    protected $redirect = 'super-admin/service';


    public function index()
    {
        $services = Service::orderBy('created_at','desc')->get();
      
        return view($this->view .'index',compact('services'));
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(ServiceStoreRequest $request)
    {
        $data = $request->except('_token');
        $slug = Str::slug($request->input('title'));
        $data['slug'] = $slug;

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoFileName = "service_logo_" . time() . '.' . $logoFile->getClientOriginalExtension();
            $logoFile->move('images/services/', $logoFileName);
            $data['logo'] = $logoFileName;
        }
    
        if ($request->hasFile('background_image')) {
            $bgImageFile = $request->file('background_image');
            $bgImageFileName = "service_bg_" . time() . '.' . $bgImageFile->getClientOriginalExtension();
            $bgImageFile->move('images/services/', $bgImageFileName);
            $data['background_image'] = $bgImageFileName;
        }

        if ($request->hasFile('service_image')) {
            $bgImageFile = $request->file('service_image');
            $bgImageFileName = "service_img_" . time() . '.' . $bgImageFile->getClientOriginalExtension();
            $bgImageFile->move('images/services/', $bgImageFileName);
            $data['service_image'] = $bgImageFileName;
        }
    
        $service = Service::create($data);
        if ($service) {
            Session::flash('success', 'Service has been created!');
            return redirect($this->redirect);
        }
    
    }
    
   


    public function edit($id)
    {
        // dd($service);
        $service = Service::findOrFail($id);
        return view($this->view .'edit', compact('service'));
    }


    public function update(ServiceUpdateRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->except('_token', '_method');
    
        if ($request->hasFile('logo')) {
            if ($service->logo) {
                File::delete(public_path('images/services/' . $service->logo));
            }
    
            $logoFile = $request->file('logo');
            $logoFileName = "service_logo_" . time() . '.' . $logoFile->getClientOriginalExtension();
            $logoFile->move(public_path('images/services/'), $logoFileName);
            $data['logo'] = $logoFileName;
        }
    
        if ($request->hasFile('background_image')) {
            if ($service->background_image) {
                File::delete(public_path('images/services/' . $service->background_image));
            }
    
            $bgImageFile = $request->file('background_image');
            $bgImageFileName = "service_bg_" . time() . '.' . $bgImageFile->getClientOriginalExtension();
            $bgImageFile->move(public_path('images/services/'), $bgImageFileName);
            $data['background_image'] = $bgImageFileName;
        }

        if ($request->hasFile('service_image')) {
            if ($service->service_image) {
                File::delete(public_path('images/services/' . $service->service_image));
            }
    
            $bgImageFile = $request->file('service_image');
            $bgImageFileName = "service_img_" . time() . '.' . $bgImageFile->getClientOriginalExtension();
            $bgImageFile->move(public_path('images/services/'), $bgImageFileName);
            $data['service_image'] = $bgImageFileName;
        }
    
            $service->update($data);
            Session::flash('success', 'Service has been updated!');
            return redirect($this->redirect);
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view($this->view . 'show', compact('service'));
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
    
        
        if ($service->logo) {
            File::delete(public_path('images/services/' . $service->logo));
        }
    
    
        if ($service->background_image) {
            File::delete(public_path('images/services/' . $service->background_image));
        }

        if ($service->service_image) {
            File::delete(public_path('images/services/' . $service->service_image));
        }
    
        $service->delete();
        Session::flash('success', 'Service has been deleted!');
        return redirect($this->redirect);
    }

}
