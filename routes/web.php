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
Route::resource('backend/category', CategoryController::class);
