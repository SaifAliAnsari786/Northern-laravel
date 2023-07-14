<?php

namespace App\Services;

use App\Models\Count;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageContentList;
use Illuminate\Support\Facades\DB;

class PageService
{
    public function store($validatedData)
    {
        if (Page::count() > 0) {
            $orderBy = Page::max('order_by');
            $validatedData['order_by'] = $orderBy + 1;
        } else {
            $validatedData['order_by'] = 1;
        }
        $validatedData['page_slug'] = SettingService::create_slug($validatedData['page_name']);
        if (request('page_image')) {
            if ($validatedData['page_image']) {
                $extension = $validatedData['page_image']->getClientOriginalExtension();
                $image_folder_type = array_search('page', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = SettingService::save_image1($validatedData['page_image'], $extension, $count, $image_folder_type);
                $validatedData['page_image'] = $out_put_path[0];
                $validatedData['page_image_alt'] = $out_put_path[1];
            }
        }

        $setting = Page::create($validatedData);
        return $setting;
    }

    public function update($validatedData, $setting)
    {
        $validatedData['page_slug'] = SettingService::create_slug($validatedData['page_name']);
        if (request('page_image')) {
            if ($validatedData['page_image']) {
                $extension = $validatedData['page_image']->getClientOriginalExtension();
                $image_folder_type = array_search('page', config('custom.image_folders')); //for image saved in folder
                $count = Count::getCount();
                $out_put_path = SettingService::save_image1($validatedData['page_image'], $extension, $count, $image_folder_type);
                SettingService::deleteImage(public_path() . '/' . $setting->page_image);
                $validatedData['page_image'] = $out_put_path[0];
                $validatedData['page_image_alt'] = $out_put_path[1];
            }
        }

        $setting = $setting->update($validatedData);
        return $setting;
    }

    public function storePageContent($validatedData, $page)
    {
        try {
            DB::beginTransaction();
            if (PageContent::count() > 0) {
                $orderBy = Page::max('order_by');
                $validatedData['order_by'] = $orderBy + 1;
            } else {
                $validatedData['order_by'] = 1;
            }
            $validatedData['section_slug'] = SettingService::create_slug($validatedData['section_name']);
            if (request('section_image')) {
                if ($validatedData['section_image']) {
                    $extension = $validatedData['section_image']->getClientOriginalExtension();
                    $image_folder_type = array_search('page', config('custom.image_folders')); //for image saved in folder
                    $count = Count::getCount();
                    $out_put_path = SettingService::save_image1($validatedData['section_image'], $extension, $count, $image_folder_type);
                    $validatedData['section_image'] = $out_put_path[0];
                }
            }
            $validatedData['page_id'] = $page->id;
            $setting = PageContent::create($validatedData);

            //saving page contents
            if (request('section_radio') == 1) {
                if (request('page_content_title')) {
                    foreach (request('page_content_title') as $index => $value) {
                        $pageContentList = new PageContentList();
                        $pageContentList->page_content_id = $setting->id;
                        $pageContentList->page_content_title = request('page_content_title')[$index];
                        $pageContentList->page_content_description = request('page_content_description')[$index];
                        if (request('page_content_image')) {
                            if (array_key_exists($index, request('page_content_image'))) {
                                $extension = request('page_content_image')[$index]->getClientOriginalExtension();
                                $image_folder_type = array_search('page', config('custom.image_folders')); //for image saved in folder
                                $count = Count::getCount();
                                $out_put_path = SettingService::save_image1(request('page_content_image')[$index], $extension, $count, $image_folder_type);
                                $validatedData['page_content_image'] = $out_put_path[0];
                            }
                        }
                        $pageContentList->save();
                    }
                }
            }
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updatePageContent($validatedData, $setting)
    {
        try {
            DB::beginTransaction();
            $validatedData['section_slug'] = SettingService::create_slug($validatedData['section_name']);
            if (request('section_image')) {
                if ($validatedData['section_image']) {
                    $extension = $validatedData['section_image']->getClientOriginalExtension();
                    $image_folder_type = array_search('page', config('custom.image_folders')); //for image saved in folder
                    $count = Count::getCount();
                    $out_put_path = SettingService::save_image1($validatedData['section_image'], $extension, $count, $image_folder_type);
                    SettingService::deleteImage(public_path() . '/' . $setting->section_image);
                    $validatedData['section_image'] = $out_put_path[0];
                }
            }
            $setting->update($validatedData);
            //saving page contents
            if (request('section_radio') == 1) {
                if (request('page_content_title')) {
                    $setting->page_content_lists()->delete();
                    foreach (request('page_content_title') as $index => $value) {
                        $pageContentList = new PageContentList();
                        $pageContentList->page_content_id = $setting->id;
                        $pageContentList->page_content_title = request('page_content_title')[$index];
                        $pageContentList->page_content_description = request('page_content_description')[$index];
                        if (request('page_content_image')) {
                            if (array_key_exists($index, request('page_content_image'))) {
                                $extension = request('page_content_image')[$index]->getClientOriginalExtension();
                                $image_folder_type = array_search('page', config('custom.image_folders')); //for image saved in folder
                                $count = Count::getCount();
                                $out_put_path = SettingService::save_image1(request('page_content_image')[$index], $extension, $count, $image_folder_type);
                                $pageContentList->page_content_image = $out_put_path[0];
                            }
                        }
                        $pageContentList->save();
                    }
                }

            } else {
                $setting->page_content_lists()->delete();
            }
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}
