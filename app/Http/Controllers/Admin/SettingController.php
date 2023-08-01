<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\SettingService;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    protected $view = 'admin.setting.';
    protected $redirect = 'super-admin/settings';
    protected $settingService;


    public function __construct(SettingService $service)
    {
        $this->settingService = $service;
    }

    public function index()
    {
        $settings = $this->settingService->search();
        return view($this->view . 'index', compact('settings'));
    }

    public function create()
    {

        return view($this->view . 'create');
    }

    public function store(Request $request)
    {

        $this->validate(\request(), [
            'type' => 'required',
            'key' => 'required',
            'status' => 'required',
        ]);
        if (request('type') == array_search('Image', config('custom.setting_types'))) {
            $this->validate(request(), [
                    'value' => 'required|file|mimes:jpeg,png,jpg,pdf,webp,svg|max:2048'
                ]
            );
        }
        $this->settingService->storeData();

        Session::flash('success', 'Setting has been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view($this->view . 'edit', compact('setting'));
    }

    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return view($this->view . 'show', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(\request(), [
            'type' => 'required',
            'key' => 'required',
            'status' => 'required'
        ]);
        if (request('type') == array_search('Image', config('custom.setting_types'))) {
            if (\request('value')) {
                $this->validate($request, [
                        'value' => 'required|file|mimes:jpeg,png,jpg,pdf,webp,svg|max:2048'
                    ]
                );
            }
        } else {
            $this->validate($request, [
                    'value' => 'required'
                ]
            );
        }
        $setting = Setting::findOrFail($id);
        $this->settingService->updateData($setting);
        Session::flash('success', 'Setting has been updated!');
        return redirect($this->redirect);
    }

    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $path = public_path() . '/' . $setting->image;
        // SettingService::deleteImage($path); //unlink Image
        $setting->delete();
        Session::flash('success', 'Setting has been deleted!');
        return redirect($this->redirect);
    }

    public function changeOrder()
    {
        $validatedData = $this->validate(\request(), [
            'slider_id' => 'required|numeric',
            'order_by' => 'required|numeric'
        ]);
        $setting = Slider::findOrFail($validatedData['slider_id']);
        $setting->order_by = $validatedData['order_by'];
        $setting->save();
        return response()->json(['data' => 'ok', 'status' => 'change'], 200);
    }
    public function getImageDom()
    {
        $returnHTML = view($this->view . 'image_dom')->render();// or method that you prefere to return data + RENDER is the key here
        return response()->json(array('success' => true, 'html' => $returnHTML));

    }
}
