<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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