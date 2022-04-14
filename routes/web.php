<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('slider',function(){
//     // return view('slider.index');
// });
// Route::get('slider/create',function(){
//     return view('backend.slider.create');
// });
Route::get('/slider_index',[App\Http\Controllers\SliderController::class,'index']);
Route::get('slider/create',[SliderController::class,'create']);
Route::post('slider/store',[SliderController::class,'store']);
Route::get('slider_edit/{id}',[SliderController::class,'edit']);
Route::put('slider_update/{id}',[SliderController::class,'update']);
Route::get('slider_delete/{id}',[SliderController::class,'destroy']);



