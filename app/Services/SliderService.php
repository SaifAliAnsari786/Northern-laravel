<?php

namespace App\Services;

use App\Models\Count;
use App\Models\Slider;
use App\Services\SettingService;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function search()
    {
        $settings = Slider::orderBy('order_by', 'asc');
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
        $setting = new Slider();
        $setting->main_heading = $validatedData['main_heading'];
        $setting->sub_heading = $validatedData['sub_heading'];
        $setting->description = $validatedData['description'];
        $setting->status = $validatedData['status'];
        $setting->type = $validatedData['type'];
        $setting->image_alt = $validatedData['image_alt'];
        // $setting->image_name = $validatedData['image_name'];
        // $setting->image_alt = $validatedData['image'];
        if (Slider::count() > 0) {
            $slider = Slider::orderBy('order_by', 'desc')->first();
            $setting->order_by = $slider->order_by + 1;
        } else {
            $setting->order_by = 1;
        }
        if (request()->hasFile('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('slider', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1($validatedData['image'], $extension, $count, $image_folder_type);
            $setting->image = $out_put_path[0];
            $setting->image_name = $out_put_path[1];
        }
        return $setting->save();
        dd($setting->all());
    }

//     public function storeVideoData($validatedData)
//     {
//         $setting = new Slider();
//         $setting->type = $validatedData['type'];
//         $setting->status = $validatedData['status'];
//         if (Slider::count() > 0) {
//             $slider = Slider::orderBy('order_by', 'desc')->first();
//             $setting->order_by = $slider->order_by + 1;
//         } else {
//             $setting->order_by = 1;
//         }
// //        if (request()->hasFile('image')) {
//         if (request()->hasFile('image') && request()->file('image')->isValid()) {
//             $fileName = request('image')->getClientOriginalName();
//             $count = Count::getCount();
//             $filePath = 'videos/' . $count . $fileName;
//             $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents(request('image')));
//             // File URL to access the video in frontend
//             $url = Storage::disk('public')->url($filePath);
//             if ($isFileUploaded) {
//                 $setting->image = $filePath;
//                 return $setting->save();

//             }
//         }
//         return $setting->save();
//     }

    public function updateData($setting, $validatedData)
    {
        $setting->main_heading = $validatedData['main_heading'];
        $setting->sub_heading = $validatedData['sub_heading'];
        $setting->description = $validatedData['description'];
        $setting->status = $validatedData['status'];
        $setting->image_alt = $validatedData['image_alt'];
        if (request()->hasFile('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('slider', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1(\request('image'), $extension, $count, $image_folder_type);
            $path = public_path() . '/' . $setting->image;
            SettingService::deleteImage($path); // unlink image
            $setting->image = $out_put_path[0];
            $setting->image_name = $out_put_path[1];
        }
        $setting->save();
    }

    // public function updateVideoData($setting, $validatedData)
    // {
    //     $setting->type = $validatedData['type'];
    //     $setting->status = $validatedData['status'];
    //     if (request()->hasFile('image') && request()->file('image')->isValid()) {
    //         $fileName = request('image')->getClientOriginalName();
    //         $count = Count::getCount();
    //         $filePath = 'videos/' . $count . $fileName;
    //         $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents(request('image')));
    //         // File URL to access the video in frontend
    //         $url = Storage::disk('public')->url($filePath);
    //         if ($isFileUploaded) {
    //             if (Storage::exists('/videos/' . $setting->image)) {
    //                 Storage::delete('/videos/' . $setting->image);
    //             }
    //             $setting->image = $filePath;
    //             return $setting->save();
    //         }
    //     }
    //     return $setting->save();
    // }

}
