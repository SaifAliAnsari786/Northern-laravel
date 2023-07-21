<?php

use App\Http\Controllers\Admin\SeoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/fornted', function () {
//     return view('forntend');
// });

// Route::get('admin', function () {
//     return view('admin.index');
// });

Route::get('', [HomeController::class, 'home']);


// Authentication//
Route::get('gethome', [LoginController::class, 'gethome']);
Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);
Route::get('logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'super-admin','middleware' => ['auth']], function () {
    Route::get('logout', [LoginController::class, 'logout']);

    Route::get('', [HomeController::class, 'index']);
    Route::get('settings', [SettingController::class, 'index']);
    Route::get('settings/create', [SettingController::class, 'create']);
    Route::post('settings', [SettingController::class, 'store']);
    Route::get('settings/{id}', [SettingController::class, 'show']);
    Route::get('settings/{id}/edit', [SettingController::class, 'edit']);
    Route::post('settings/{id}', [SettingController::class, 'update']);
    Route::get('settings/delete/{id}', [SettingController::class, 'destroy']);


    Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload'); //upload image in CkEditor
    Route::post('post-upload-image', [ImageUploadController::class, 'storeImageQuill'])->name('image.store');

    // Route::get('sliders', [SliderController::class, 'index']);
    Route::resource('sliders', SliderController::class);
    Route::get('sliders/delete/{id}', [SliderController::class, 'destroy']);
    Route::post('sliders/change-order', [SliderController::class, 'changeOrder']);
    Route::get('image-dom', [SliderController::class, 'getImageDom']);

    Route::get('seo', [SeoController::class, 'index']);
    Route::get('seo/create', [SeoController::class, 'create']);
    Route::post('seo', [SeoController::class, 'store']);
    Route::get('seo/{id}', [SeoController::class, 'show']);
    Route::get('seo/{id}/edit', [SeoController::class, 'edit']);
    Route::post('seo/{id}', [SeoController::class, 'update']);
    Route::post('seo-delete', [SeoController::class, 'postDelete']);

    Route::get('service', [ServiceController::class,'index']);
    Route::get('service/create', [ServiceController::class, 'create']);
    Route::post('service', [ServiceController::class, 'store']);
    Route::get('service/{id}', [ServiceController::class, 'show']);
    Route::get('service/{id}/edit', [ServiceController::class, 'edit']);
    Route::post('service/{id}', [ServiceController::class, 'update']);
    Route::post('service-delete', [ServiceController::class, 'postDelete']);

});







