<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

// Admin Login
Route::get('admin/login', [LoginController::class, 'showLogin'])->name('ShowAdminLogin');
Route::post('admin/login', [LoginController::class, 'login'])->name('AdminLogin');

// Admin Protected Routes
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/backend', function () {
        return view('backend.index');
    });

    Route::resource('backend/category', CategoryController::class);
    Route::resource('backend/post', PostController::class);
});

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('DetailPage');

// User Auth
Route::get('/user/login', [HomeController::class, 'Login'])->name('UserLogin');
Route::get('/user/register', [HomeController::class, 'userRegister'])->name('UserRegister');
Route::post('/user/store', [HomeController::class, 'store'])->name('UserStore');
Route::post('/user/storeLogin', [HomeController::class, 'UserLogin'])->name('UserLogin');

// Logout for both
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
