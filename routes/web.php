<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/backend', function () {
    return view('backend.index');
});

// for category
Route::resource('backend/category', CategoryController::class);

// for post 
Route::resource('backend/post', PostController::class);

// for frontend
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/detail/{id}',[HomeController::class,'detail'])->name('DetailPage');

//for login
Route::get('admin/login',[LoginController::class,'showLogin'])->name('ShowAdminLogin'); 
Route::post('admin/login',[LoginController::class,'login'])->name('AdminLogin'); 

//for user
Route::get('/user/login',[HomeController::class,'Login'])->name('UserLogin'); 
Route::get('/user/register',[HomeController::class,'userRegister'])->name('UserRegister');

Route::post('/user/store',[HomeController::class,'store'])->name('UserStore');
Route::post('/user/storeLogin',[HomeController::class,'UserLogin'])->name('UserLogin');