<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Count;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogService
{
    public function search()
    {
        $settings = Blog::orderBy('order_by', 'asc');
        if (\request('name')) {
            $key = \request('name');
            $settings = $settings->where('name', 'like', '%' . $key . '%');
        }
        if (\request('type')) {
            $key = \request('type');
            $settings = $settings->where('type', $key);
        }
        if (\request('status')) {
            $key = \request('status');
            $settings = $settings->where('status', $key);
        }
        return $settings->paginate(config('custom.per_page'));
    }

    public function storeData($validatedData)
    {
        if (Blog::count() > 0) {
            $orderBy = Blog::max('order_by');
            $validatedData['order_by'] = $orderBy + 1;
        } else {
            $validatedData['order_by'] = 1;
        }
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['slug'] = SettingService::create_slug($validatedData['name']);
        if ($validatedData['image']) {
            $extension = $validatedData['image']->getClientOriginalExtension();
            $image_folder_type = array_search('blog', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1($validatedData['image'], $extension, $count, $image_folder_type);
            $validatedData['image'] = $out_put_path[0];
            $validatedData['image_name'] = $out_put_path[1];
            $validatedData['image_alt'] = $validatedData['image_alt'];
        }
        $setting = Blog::create($validatedData);
        return $setting;
    }

    public function updateData($validatedData, $setting)
    {
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['slug'] = SettingService::create_slug($validatedData['name']);
        if (request('image')) {
            if ($validatedData['image']) {
                $extension = $validatedData['image']->getClientOriginalExtension();
                $image_folder_type = array_search('blog', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = SettingService::save_image1($validatedData['image'], $extension, $count, $image_folder_type);
                SettingService::deleteImage(public_path() . '/' . $setting->image);
                $validatedData['image'] = $out_put_path[0];
                $validatedData['image_alt'] = $validatedData['image_alt'];
            }
        }

        $setting->update($validatedData);
        return $setting;
    }
}
