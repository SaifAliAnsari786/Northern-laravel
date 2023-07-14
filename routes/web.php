<?php

use App\Http\Controllers\admin\SliderController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('admin', function () {
//     return view('admin.index');
// });

// Route::get('', [HomeController::class, 'home']);


// Authentication//
Route::get('', [LoginController::class, 'gethome']);
Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);
Route::get('logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'super-admin','middleware' => ['auth']], function () {
    Route::get('', [HomeController::class, 'index']);

    // Route::get('sliders', [SliderController::class, 'index']);
    Route::resource('sliders', SliderController::class);
    Route::get('sliders/delete/{id}', [SliderController::class, 'destroy']);
    Route::post('sliders/change-order', [SliderController::class, 'changeOrder']);
    Route::get('image-dom', [SliderController::class, 'getImageDom']);

});







