<?php

namespace App\Services;

use App\Models\Count;
use App\Models\Setting;
use App\Models\User;
use Intervention\Image\Facades\Image;

class SettingService
{
    public function storeData()
    {
        $setting = new Setting();
        $setting->key = \request('key');
        $setting->type = \request('type');
        $setting->status = \request('status');
        $setting->slug = $this->create_slug(\request('key'));
        //dd(array_search('Image', config('custom.setting_types')));

        // dd(request('type'));
        if (intval(request('type')) == array_search('Image', config('custom.setting_types'))) {
            if (request()->hasFile('value')) {
                $extension = \request()->file('value')->getClientOriginalExtension();
                $image_folder_type = array_search('setting', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = $this->save_image1(\request('value'), $extension, $count, $image_folder_type);
                $setting->value = $out_put_path[0];
                $setting->image_alt = \request('image_alt');
                $setting->image_name = $out_put_path[1];
            }

        } else {
            if (request('value')) {
                $value = request('value');
            }
            $setting->value = $value;
        }
        $setting->save();
        return $setting;
    }

    public function updateData($setting)
    {
        $setting->key = \request('key');
        $setting->type = \request('type');
        $setting->status = \request('status');
        if (request('type') == array_search('Image', config('custom.setting_types'))) {
            if (\request('value')) {
                if (request()->hasFile('value')) {
                    $extension = \request()->file('value')->getClientOriginalExtension();
                    $image_folder_type = array_search('setting', config('custom.image_folders')); //for image saved in folder
                    $count = Count::getCount();
                    $out_put_path = $this->save_image1(\request('value'), $extension, $count, $image_folder_type);
                    $unlinkPath = public_path() . '/' . $setting->value;
                    self::deleteImage($unlinkPath);
                    $setting->value = $out_put_path[0];
                    $setting->image_alt = \request('image_alt');
                    $setting->image_name = $out_put_path[1];
                }
            }


        } else {
            $setting->value = request('value');
        }
        $setting->save();
        return $setting;
    }

    public function search()
    {
        $settings = Setting::orderBy('id', 'asc');
        if (\request('name')) {
            $key = \request('name');
            $settings = $settings->where('key', 'like', '%' . $key . '%')->orWhere('slug', 'like', '%' . $key . '%');
        }
        if (\request('status')) {
            $key = \request('status');
            $settings = $settings->where('status', $key);
        }
        return $settings->paginate(config('custom.per_page'));
    }

    public function searchUser()
    {
        $userSearch = User::orderBy('id', 'desc');
        if (\request('name')) {
            $key = \request('name');
            $userSearch = $userSearch->where('name', 'like', '%' . $key . '%')->orWhere('email','like','%'.$key.'%');
        }
        return $userSearch->where('user_type', 2)->paginate(config('custom.per_page'));
    }

    public static function create_slug($string)
    {
        $replace = '-';

        $string = strtolower($string);

//        replace / and . with white space
        $string = preg_replace("/[\/\.]/", " ", $string);
        $string = preg_replace("/[^a-z0-9\s-]/", "", $string);

//        remove multiple dashes or whitespace
        $string = preg_replace("/[\s-]+/", " ", $string);

//        convert whitespaces and underscore to $replace
        $string = preg_replace("/[\s_]/", $replace, $string);

        //        limit the string size
        $string = substr($string, 0, 100);

//      slug is generated
        return $string;
    }

    public static function makeDirectory($image_folder_type)
    {
//        $image_folder_type = 1;
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        if (config('custom.image_folders')[$image_folder_type] == 'setting') {
            if (!is_dir(public_path() . '/images/setting/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/setting/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/setting/' . $year . '/' . $month . '/' . $day . '/';
        }
        if (config('custom.image_folders')[$image_folder_type] == 'home_design') {
            if (!is_dir(public_path() . '/images/home_design/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/home_design/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/home_design/' . $year . '/' . $month . '/' . $day . '/';
        }
        if (config('custom.image_folders')[$image_folder_type] == 'project') {
            if (!is_dir(public_path() . '/images/project/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/project/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/project/' . $year . '/' . $month . '/' . $day . '/';
        }

        if (config('custom.image_folders')[$image_folder_type] == 'display_home') {
            if (!is_dir(public_path() . '/images/display_home/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/display_home/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/display_home/' . $year . '/' . $month . '/' . $day . '/';
        }
        if (config('custom.image_folders')[$image_folder_type] == 'blog') {
            if (!is_dir(public_path() . '/images/blog/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/blog/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/blog/' . $year . '/' . $month . '/' . $day . '/';
        }

        if (config('custom.image_folders')[$image_folder_type] == 'download') {
            if (!is_dir(public_path() . '/images/download/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/download/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/download/' . $year . '/' . $month . '/' . $day . '/';
        }

        if (config('custom.image_folders')[$image_folder_type] == 'gallery') {
            if (!is_dir(public_path() . '/images/gallery/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/gallery/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/gallery/' . $year . '/' . $month . '/' . $day . '/';
        }
        if (config('custom.image_folders')[$image_folder_type] == 'testimonial') {
            if (!is_dir(public_path() . '/images/testimonial/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/testimonial/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/testimonial/' . $year . '/' . $month . '/' . $day . '/';
        }
        if (config('custom.image_folders')[$image_folder_type] == 'slider') {
            if (!is_dir(public_path() . '/images/slider/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/slider/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/slider/' . $year . '/' . $month . '/' . $day . '/';
        }

        if (config('custom.image_folders')[$image_folder_type] == 'seo') {
            if (!is_dir(public_path() . '/images/seo/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/seo/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/seo/' . $year . '/' . $month . '/' . $day . '/';
        }

        if (config('custom.image_folders')[$image_folder_type] == 'page') {
            if (!is_dir(public_path() . '/images/page/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/page/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/page/' . $year . '/' . $month . '/' . $day . '/';
        }

    }

    public static function save_image1($requestData, $extension, $count, $image_folder_type)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE); // Return MIME type a la the 'mimetype' extension
        $mimeType = finfo_file($finfo, $requestData);
        finfo_close($finfo);
        $size = $requestData->getSize();
        $size = round($size / 1024, 4);
        if (($mimeType == 'image/jpeg' || $mimeType == 'image/png' || $mimeType == 'image/gif' || $mimeType == 'image/webp') && $size < 7168) {
            $directory = self::makeDirectory($image_folder_type);
            $fileName = date('YYYmmdddHms') . $count . '.' . $extension;
            // Get the uploaded file
            $file = $requestData;
            // Create an Intervention Image instance
            $image = Image::make($file);
            // Save the image file
            $image->save($directory . $fileName);
            $image_path = $directory . $fileName;
            $doc_name = md5(date('YYYmmddd Hms') . '_@id' . $count . uniqid());
            return [$image_path, $doc_name];
        } elseif ($mimeType == 'image/svg+xml' || $mimeType == 'application/pdf') {
            $directory = self::makeDirectory($image_folder_type);
            $fileName = date('YYYmmdddHms') . $count . '.' . $extension;
            $requestData->move(public_path($directory), $fileName);
            $image_path = $directory . $fileName;
            $doc_name = md5(date('YYYmmddd Hms') . '_@id' . $count . uniqid());
            return [$image_path, $doc_name];
        }

    }

    public static function deleteImage($path)
    {
        if (is_file($path) && file_exists($path)) {
            unlink($path);
        }
    }
}
