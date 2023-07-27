<?php

namespace App\Services;

use App\Models\Count;
use App\Models\ServiceDescription;
use App\Services\SettingService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceDescriptions
{
    public function search()
    {
        $settings = ServiceDescription::orderBy('order_by', 'asc');
        if (\request('name')) {
            $key = \request('name');
            $settings = $settings->where('title1', 'like', '%' . $key . '%');
        }
        if (\request('status')) {
            $key = \request('status');
            $settings = $settings->where('status', $key);
        }
        return $settings->paginate(config('custom.per_page'));
    }

    public function storeData($validatedData)
    {
        $setting = new ServiceDescription();
        $setting->title = $validatedData['title'];
        $setting->description = $validatedData['description'];
        $setting->image_alt = $validatedData['image_alt'];
        $setting->slug = Str::slug(\request('title'));
        if (ServiceDescription::count() > 0) {
            $serviceDescription = ServiceDescription::orderBy('order_by', 'desc')->first();
            $setting->order_by = $serviceDescription->order_by + 1;
        } else {
            $setting->order_by = 1;
        }
        if (request()->hasFile('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('ServiceDescription', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1($validatedData['image'], $extension, $count, $image_folder_type);
            $setting->image = $out_put_path[0];
            $setting->image_name = $out_put_path[1];
        }
        return $setting->save();
        // dd($setting->all());
    }
    public function updateData($setting, $validatedData)
    {
        $setting->title = $validatedData['title'];
        $setting->description = $validatedData['description'];
        $setting->image_alt = $validatedData['image_alt'];
        if (request()->hasFile('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('ServiceDescription', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1(\request('image'), $extension, $count, $image_folder_type);
            $path = public_path() . '/' . $setting->image;
            SettingService::deleteImage($path); // unlink image
            $setting->image = $out_put_path[0];
            $setting->image_name = $out_put_path[1];
        }
        $setting->save();
    }

}
