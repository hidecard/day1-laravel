<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/backend', function () {
    return view('backend.index');
});

// for category
Route::resource('backend/category', CategoryController::class);

// for post 
Route::get('post/list',[PostController::class,'index'])->name('postlist');
Route::get('post/create',[PostController::class,'create'])->name('postcreate');
Route::post('post/store',[PostController::class,'store'])->name('poststore');