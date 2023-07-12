<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


// Authentication//
Route::get('', [AuthController::class, 'getHome']);
Route::get('/login',[AuthController::class,'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'getLogout']);

// Admin Dashboard
Route::middleware(['auth'])->group(function () {
Route::get('dashboard', [DashboardController::class,'index']);
});



