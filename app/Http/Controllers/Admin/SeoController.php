<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeoRequest;
use App\Models\Count;
use App\Models\Seo;
use App\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeoController extends Controller
{
    protected $view = 'admin.seo.';
    protected $redirect = 'super-admin/seo';

    public function index()
    {
        $settings = Seo::paginate(config('custom.per_page'));
        return view($this->view.'index', compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(SeoRequest $request)
    {
        $validatedData = $request->validated();
        if (\request('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('seo', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1($validatedData['image'], $extension, $count,$image_folder_type);
            $validatedData['image'] = $out_put_path[0];
        }
        $setting = Seo::firstOrNew(['seo_type' => $validatedData['seo_type']]);
        $setting->seo_title = $validatedData['seo_title'];
        $setting->seo_description = $validatedData['seo_description'];
        $setting->seo_keyword = $validatedData['seo_keyword'];
        $setting->seo_meta_keyword = $validatedData['seo_meta_keyword'];
        if (\request('image')) {
            $setting->image = $validatedData['image'];
        }
        $setting->image_alt = $validatedData['image_alt'];
        $setting->save();
        Session::flash('success', 'Seo has been created!');
        return redirect($this->redirect);
    }


    public function show($id)
    {
        $setting = Seo::findOrFail($id);
        return view($this->view.'show', compact('setting'));
    }

    public function edit($id)
    {
        $setting = Seo::findOrFail($id);
        return view($this->view.'edit', compact('setting'));
    }

    public function update(SeoRequest $request, $id)
    {
        $validatedData = $request->validated();
        $setting = Seo::findOrFail($id);
        if (\request('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('seo', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1($validatedData['image'], $extension, $count,$image_folder_type);
            SettingService::deleteImage(public_path().'/'.$setting->image);
            $validatedData['image'] = $out_put_path[0];
        }
        $setting->update($validatedData);
        Session::flash('success', 'Seo has been updated!');
        return redirect($this->redirect);
    }

    public function postDelete()
    {
        $this->validate(\request(), [
            'id' => 'required|numeric',
        ]);
        $setting = Seo::findOrFail(\request('id'));
        SettingService::deleteImage(public_path().'/'.$setting->image);
        $setting->delete();
        return response()->json(['status' => 'ok', 'id' => $setting->id, 'message' => 'blog  deleted!'], 200);
    }


}
