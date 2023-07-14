<?php

namespace App\Services;

use App\Models\Count;
use App\Models\DesignDimension;
use App\Models\DesinFeature;
use App\Models\HomeDesign;
use App\Models\HomeDesignImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeDesignService
{
    public function search()
    {
        $settings = HomeDesign::orderBy('order_by', 'asc');
        if (\request('name')) {
            $key = \request('name');
            $settings = $settings->where('name', 'like', '%' . $key . '%');
        }
        if (\request('design_type')) {
            $key = \request('design_type');
            $settings = $settings->where('design_type', $key);
        }
        if (\request('status')) {
            $key = \request('status');
            $settings = $settings->where('status', $key);
        }
        return $settings->paginate(config('custom.per_page'));
    }

    public function storeData($validatedData)
    {
        try {
            DB::beginTransaction();
            if (HomeDesign::count() > 0) {
                $orderBy = HomeDesign::max('order_by');
                $validatedData['order_by'] = $orderBy + 1;
            } else {
                $validatedData['order_by'] = 1;
            }
            $validatedData['user_id'] = Auth::user()->id;
            $validatedData['slug'] = SettingService::create_slug($validatedData['name']);
            if ($validatedData['image']) {
                $extension = $validatedData['image'][0]->getClientOriginalExtension();
                //            $fullName = $validatedData['image'][0]->getClientOriginalName();
                //            $myImageAlt = explode('.'.$extension,$fullName);
                $image_folder_type = array_search('home_design', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = SettingService::save_image1($validatedData['image'][0], $extension, $count, $image_folder_type);
                $validatedData['home_image'] = $out_put_path[0];
                $validatedData['home_image_name'] = $out_put_path[1];
                $validatedData['home_image_alt'] = $validatedData['image_alt'][0];
            }
            if ($validatedData['floor_plan_image']) {
                $extension = $validatedData['floor_plan_image']->getClientOriginalExtension();
                $image_folder_type = array_search('home_design', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = SettingService::save_image1($validatedData['floor_plan_image'], $extension, $count, $image_folder_type);
                $validatedData['floor_plan_image'] = $out_put_path[0];
                $validatedData['floor_plan_image_name'] = $out_put_path[1];
            }
            $setting = HomeDesign::create($validatedData);
            foreach ($validatedData['image'] as $index => $value) {
                $homeDesignImage = new HomeDesignImage();
                $homeDesignImage->home_design_id = $setting->id;
                $extension = $validatedData['image'][$index]->getClientOriginalExtension();
                $image_folder_type = array_search('home_design', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = SettingService::save_image1($validatedData['image'][$index], $extension, $count, $image_folder_type);
                $homeDesignImage->image = $out_put_path[0];
                $homeDesignImage->image_name = $out_put_path[1];
                $homeDesignImage->image_alt = $validatedData['image_alt'][$index];
                $homeDesignImage->order_by = $validatedData['image_order_by'][$index];
                $homeDesignImage->save();
            }

            if (request('type_of_feature')) {
                foreach ($validatedData['type_of_feature'] as $index1 => $value1) {
                    $designFeature = new DesinFeature();
                    $designFeature->home_design_id = $setting->id;
                    $designFeature->type_of_feature = $validatedData['type_of_feature'][$index1];
                    $designFeature->feature = $validatedData['feature'][$index1];
                    $designFeature->order_by = $validatedData['feature_order_by'][$index1];
                    $designFeature->status = 1;
                    $designFeature->save();
                }
            }
            if (request('type_of_dimension')) {
                foreach ($validatedData['type_of_dimension'] as $index2 => $value2) {
                    $designDimension = new DesignDimension();
                    $designDimension->home_design_id = $setting->id;
                    $designDimension->type_of_dimension = $validatedData['type_of_dimension'][$index2];
                    $designDimension->name = $validatedData['room_name'][$index2];
                    $designDimension->dimension = $validatedData['room_dimension'][$index2];
                    $designDimension->status = 1;
                    $designDimension->save();
                }
            }
            $setting->bed = $setting->bedCount();
            $setting->bath = $setting->bathCount();
            $setting->living_room = $setting->livingRoomCount();
            $setting->kitchen = $setting->kitchenCount();
            $setting->garage = $setting->garageCount();
            $setting->garden = $setting->gardenCount();
            $setting->dinning = $setting->dinnigCount();
            $setting->save();
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateData($validatedData, $setting)
    {
        try {
            DB::beginTransaction();
            $validatedData['user_id'] = Auth::user()->id;
            $validatedData['slug'] = SettingService::create_slug($validatedData['name']);
            if (request('image_old')) {
                if ($setting->homeDesignImages->count() > 0) {
                    $check_home_image_id = $setting->homeDesignImages->first()->id;
                    if (array_key_exists($check_home_image_id, request('image_old'))) {
                        $extension = request('image_old')[$check_home_image_id]->getClientOriginalExtension();
                        $image_folder_type = array_search('home_design', config('custom.image_folders')); //for image saved in folder
                        $count = Count::getCount();
                        $out_put_path = SettingService::save_image1(request('image_old')[$check_home_image_id], $extension, $count, $image_folder_type);
                        $path = public_path() . '/' . $setting->home_image;
                        SettingService::deleteImage($path);
                        $validatedData['home_image'] = $out_put_path[0];
                        $validatedData['home_image_name'] = $out_put_path[1];
                    }
                }
            }
            if (request('floor_plan_image')) {
                $extension = $validatedData['floor_plan_image']->getClientOriginalExtension();
                $image_folder_type = array_search('home_design', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = SettingService::save_image1($validatedData['floor_plan_image'], $extension, $count, $image_folder_type);
                SettingService::deleteImage(public_path() . '/' . $setting->floor_plan_image);
                $validatedData['floor_plan_image'] = $out_put_path[0];
                $validatedData['floor_plan_image_name'] = $out_put_path[1];
            }
            $setting->update($validatedData);

            if (request('home_design_image_id')) {
                foreach (request('home_design_image_id') as $myIndex => $home_design_image_id) {
                    $homeDesignImageOld = HomeDesignImage::findOrFail($home_design_image_id);
                    if (request('image_old')) {
                        if (array_key_exists($home_design_image_id, request('image_old'))) {
                            $extension = request('image_old')[$home_design_image_id]->getClientOriginalExtension();
                            $image_folder_type = array_search('home_design', config('custom.image_folders')); //for image saved in folder
                            $count = Count::getCount();
                            $out_put_path = SettingService::save_image1(request('image_old')[$home_design_image_id], $extension, $count, $image_folder_type);
                            SettingService::deleteImage(public_path() . '/' . $homeDesignImageOld->image);
                            $homeDesignImageOld->image = $out_put_path[0];
                            $homeDesignImageOld->image_name = $out_put_path[1];
                        }
                    }
                    $homeDesignImageOld->image_alt = request('image_alt_old')[$myIndex];
                    $homeDesignImageOld->order_by = request('image_order_by_old')[$myIndex];
                    $homeDesignImageOld->save();
                }
            }
            if (request('image')) {
                foreach ($validatedData['image'] as $index => $value) {
                    $homeDesignImage = new HomeDesignImage();
                    $homeDesignImage->home_design_id = $setting->id;
                    $extension = $validatedData['image'][$index]->getClientOriginalExtension();
                    $image_folder_type = array_search('home_design', config('custom.image_folders')); //for image saved in folder
                    $count = Count::getCount();
                    $out_put_path = SettingService::save_image1($validatedData['image'][$index], $extension, $count, $image_folder_type);
                    $homeDesignImage->image = $out_put_path[0];
                    $homeDesignImage->image_name = $out_put_path[1];
                    $homeDesignImage->image_alt = $validatedData['image_alt'][$index];
                    $homeDesignImage->order_by = $validatedData['image_order_by'][$index];
                    $homeDesignImage->save();
                }
            }

            if (request('type_of_feature_old')) {
                $setting->designFeatures()->delete();
                foreach (request('type_of_feature_old') as $index_old1 => $value_old1) {
                    $designFeatureOld = new DesinFeature();
                    $designFeatureOld->home_design_id = $setting->id;
                    $designFeatureOld->type_of_feature = request('type_of_feature_old')[$index_old1];
                    $designFeatureOld->feature = request('feature_old')[$index_old1];
                    $designFeatureOld->order_by = request('feature_order_by_old')[$index_old1];
                    $designFeatureOld->status = 1;
                    $designFeatureOld->save();
                }
            }

            if (request('type_of_feature')) {
                foreach ($validatedData['type_of_feature'] as $index1 => $value1) {
                    $designFeature = new DesinFeature();
                    $designFeature->home_design_id = $setting->id;
                    $designFeature->type_of_feature = $validatedData['type_of_feature'][$index1];
                    $designFeature->feature = $validatedData['feature'][$index1];
                    $designFeature->order_by = $validatedData['feature_order_by'][$index1];
                    $designFeature->status = 1;
                    $designFeature->save();
                }
            }

            if (request('type_of_dimension_old')) {
                $setting->designDimensions()->delete();
                foreach (request('type_of_dimension_old') as $index_old2 => $value_old2) {
                    $designDimension = new DesignDimension();
                    $designDimension->home_design_id = $setting->id;
                    $designDimension->type_of_dimension = request('type_of_dimension_old')[$index_old2];
                    $designDimension->name = request('room_name_old')[$index_old2];
                    $designDimension->dimension = request('room_dimension_old')[$index_old2];
                    $designDimension->status = 1;
                    $designDimension->save();
                }
            }
            if (request('type_of_dimension')) {
                foreach ($validatedData['type_of_dimension'] as $index2 => $value2) {
                    $designDimension = new DesignDimension();
                    $designDimension->home_design_id = $setting->id;
                    $designDimension->type_of_dimension = $validatedData['type_of_dimension'][$index2];
                    $designDimension->name = $validatedData['room_name'][$index2];
                    $designDimension->dimension = $validatedData['room_dimension'][$index2];
                    $designDimension->status = 1;
                    $designDimension->save();
                }
            }

            $setting->bed = $setting->bedCount();
            $setting->bath = $setting->bathCount();
            $setting->living_room = $setting->livingRoomCount();
            $setting->kitchen = $setting->kitchenCount();
            $setting->garage = $setting->garageCount();
            $setting->garden = $setting->gardenCount();
            $setting->dinning = $setting->dinnigCount();
            $setting->save();
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
