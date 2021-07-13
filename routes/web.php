<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



//Auth routes
Auth::routes();
Route::get('register_provider',[\App\Http\Controllers\Auth\RegisterProviderController::class,'showProviderForm'])->name('register_provider_form');
Route::post('register_provider',[\App\Http\Controllers\Auth\RegisterProviderController::class,'register'])->name('register_provider');

//EndAuth
Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('home');

//Google
Route::get('redirect', [\App\Http\Controllers\SocialController::class,'redirect'])->name('google_redirect');
Route::get('callback',  [\App\Http\Controllers\SocialController::class,'callback']);

//FaceBook
Route::get('/fb_redirect', [\App\Http\Controllers\SocialFacebookController::class,'redirect'])->name('fb_redirect');
Route::get('/fb_callback',  [\App\Http\Controllers\SocialFacebookController::class,'callback']);

//UserEdit

Route::get('/user/edit/{id}/{type}',[\App\Http\Controllers\UsersController::class,'edit'])->name('user.edit');
Route::put('/user/update/{id}/{type}',[\App\Http\Controllers\UsersController::class,'update'])->name('user.update');
Route::delete('/user/delete/{id}/{type}',[\App\Http\Controllers\UsersController::class,'delete'])->name('user.delete');

Route::get('buyer/{buyer}',function ($buyer){
    var_dump($buyer);
})->name('buyer');
