<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ServiceController extends Controller
{
    protected $view = 'admin.service.';
    protected $redirect = 'super-admin/service';


    public function index()
    {
        $services = Service::orderBy('created_at','desc')->get();
        $orderBys = Service::orderBy('order_by', 'desc');
        if ($orderBys->count() > 0) {
            $orderBys = $orderBys->first()->order_by + 1;
        } else {
            $orderBys = 0;
        }
        return view($this->view .'index',compact('services','orderBys'));
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(ServiceStoreRequest $request)
    {
        $data = $request->except('_token');

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
    
        $service->delete();
        Session::flash('success', 'Service has been deleted!');
        return redirect($this->redirect);
    }

}
