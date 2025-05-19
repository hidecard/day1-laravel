<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.detail');
});
Route::get('/dashboard', function () {
    return view('backend.index');
});
