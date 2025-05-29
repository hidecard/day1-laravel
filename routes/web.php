<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserpostController;

// Admin Login
Route::get('admin/login', [LoginController::class, 'showLogin'])->name('ShowAdminLogin');
Route::post('admin/login', [LoginController::class, 'login'])->name('AdminLogin');
Route::get('admin/register', [LoginController::class, 'showAdminRegister'])->name('ShowAdminRegister');
Route::post('admin/register', [LoginController::class, 'register'])->name('AdminRegister');

// Admin Password Reset
Route::get('admin/password/reset', [LoginController::class, 'showPasswordReset'])->name('password.request');
Route::post('admin/password/email', [LoginController::class, 'sendPasswordResetLink'])->name('password.email');

// Admin Protected Routes
Route::middleware(['admin.auth'])->group(function () {
    Route::get('/backend', fn() => view('backend.index'))->name('backend.index');
    Route::resource('backend/category', CategoryController::class);
    Route::resource('backend/post', PostController::class);
});

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('DetailPage');

// User Auth
Route::get('/user/login', [HomeController::class, 'Login'])->name('ShowUserLogin');
Route::post('/user/login', [HomeController::class, 'UserLogin'])->name('UserLogin');
Route::get('/user/register', [HomeController::class, 'userRegister'])->name('UserRegister');
Route::post('/user/register', [HomeController::class, 'store'])->name('UserStore');

// Logout (shared for admin and user)
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('post', UserpostController::class);