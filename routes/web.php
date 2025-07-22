<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Vendor\HomeController as VendorHomeController;
use App\Http\Controllers\User\HomeController as UserHomeController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
    // Admin-specific routes like user/vendor management can go here
    Route::get('/admin/create-user', [HomeController::class, 'createUser'])->name('admin.createUser');
    Route::post('/admin/store-user', [HomeController::class, 'storeUser'])->name('admin.storeUser');
    Route::get('/admin/create-vendor', [HomeController::class, 'createVendor'])->name('admin.createVendor');
    Route::post('/admin/store-vendor', [HomeController::class, 'storeVendor'])->name('admin.storeVendor');
});

// Vendor routes
Route::middleware(['auth', 'vendor'])->group(function () {
    Route::get('/vendor/home', [VendorHomeController::class, 'index'])->name('vendor.home');
    // Add vendor-specific routes here
});

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');
    // User-specific routes can go here
});

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
