<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceDescriptionRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\ServiceDescription;
use App\Services\ServiceDescriptions;
use App\Services\SliderService;
use Illuminate\Support\Facades\Session;
use App\Models\Service;


class ServiceDescriptionController extends Controller
{

    protected $view = 'admin.service_description.';
    protected $redirect = 'super-admin/service-description';
    protected $serviceDescriptions;

    public function __construct(ServiceDescriptions $service)
    {
        $this->serviceDescriptions = $service;
    }

    public function index($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $orderBys = ServiceDescription::orderBy('order_by', 'desc');
        if ($orderBys->count() > 0) {
            $orderBys = $orderBys->first()->order_by + 1;
        } else {
            $orderBys = 0;
        }
        return view($this->view . 'index',compact('service', 'orderBys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view($this->view . 'create', compact('service'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceDescriptionRequest $request, $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $validatedData = $request->validated();
        $this->serviceDescriptions->storeData($validatedData, $service);
        Session::flash('success', 'Service description  has been created!');
        // dd(request()->all());
        return redirect($this->redirect.'/'.$service->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = ServiceDescription::findOrFail($id);
        return view($this->view . 'edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceDescriptionRequest $request, $id)
    {
        $setting = ServiceDescription::findOrFail($id);
        $validatedData = $request->validated();
        $this->serviceDescriptions->updateData($setting, $validatedData);
        Session::flash('success', 'Service description  has been updated!');
        // return redirect($this->redirect);
        return redirect($this->redirect);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $setting = ServiceDescription::findOrFail($id);
        $path = public_path() . '/' . $setting->image;
        // SettingService::deleteImage($path); //unlink Image
        $setting->delete();
        Session::flash('success', 'Service description has been deleted!');
        // return redirect($this->redirect.'/'.$service->id);
        return redirect($this->redirect.'/'.$setting->id);

    }

    public function changeOrder()
    {
        $validatedData = $this->validate(\request(), [
            'serviceDescription_id' => 'required|numeric',
            'order_by' => 'required|numeric'
        ]);
        $setting = ServiceDescription::findOrFail($validatedData['serviceDescription_id']);
        $setting->order_by = $validatedData['order_by'];
        $setting->save();
        return response()->json(['data' => 'ok', 'status' => 'change'], 200);
    }
}
