<?php
namespace App\Services;

use App\Models\Count;
use App\Models\Testimonial;

class TestimonialService
{
    public function search()
    {
        $settings = Testimonial::orderBy('order_by', 'asc');
        if (\request('name')) {
            $key = \request('name');
            $settings = $settings->where('title1', 'like', '%'.$key.'%');
        }
        if (\request('status')) {
            $key = \request('status');
            $settings = $settings->where('status', $key);
        }
        return $settings->paginate(config('custom.per_page'));
    }

    public function storeData($validatedData)
    {
        $setting = new Testimonial();
        $setting->author_name = $validatedData['author_name'];
        $setting->author_designation = $validatedData['author_designation'];
        $setting->review = $validatedData['review'];
        $setting->status = $validatedData['status'];
        $setting->image_alt = $validatedData['image_alt'];
        if (Testimonial::count() > 0) {
            $slider = Testimonial::orderBy('order_by', 'desc')->first();
            $setting->order_by = $slider->order_by + 1;
        } else {
            $setting->order_by = 1;
        }
        if (request()->hasFile('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('testimonial', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1($validatedData['image'], $extension, $count,$image_folder_type);
            $setting->image = $out_put_path[0];
            $setting->image_name = $out_put_path[1];
        }
        return $setting->save();
    }

    public function updateData($setting, $validatedData)
    {
        $setting->author_name = $validatedData['author_name'];
        $setting->author_designation = $validatedData['author_designation'];
        $setting->review = $validatedData['review'];
        $setting->status = $validatedData['status'];
        $setting->image_alt = $validatedData['image_alt'];
        if (request()->hasFile('image')) {
            $extension = \request()->file('image')->getClientOriginalExtension();
            $image_folder_type = array_search('testimonial', config('custom.image_folders')); //for image saved in folder
            $count = Count::getCount();
            $out_put_path = SettingService::save_image1(\request('image'), $extension, $count, $image_folder_type);
            $path = public_path().'/'.$setting->image;
            SettingService::deleteImage($path); // unlink image
            $setting->image = $out_put_path[0];
            $setting->image_name = $out_put_path[1];
        }
        $setting->save();
    }
}
