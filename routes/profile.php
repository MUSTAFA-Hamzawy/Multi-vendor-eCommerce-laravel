<?php

use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

// for admin
Route::middleware(['auth', 'auth.role:admin'])
    ->prefix('admin')
    ->name('admin-')
    ->controller(AdminController::class)->group(function (){
        // profile
        Route::view('profile', 'backend.profile.admin_profile')->name('profile');
        Route::post('profile/update_info', 'updateInfo')->name('profile-info-update');
        Route::post('profile/update_image', 'updateImage')->name('profile-image-update');
        Route::post('profile/update_password', 'updatePassword')->name('profile-password-update');
    });

// for vendor
Route::middleware(['auth', 'auth.role:vendor'])
    ->prefix('vendor')
    ->name('vendor-')
    ->controller(VendorController::class)->group(function (){

        // profile
        Route::view('profile', 'backend.profile.vendor_profile')->name('profile');
        Route::post('profile/update_info', 'updateInfo')->name('profile-info-update');
        Route::post('profile/update_image', 'updateImage')->name('profile-image-update');
        Route::post('profile/update_password', 'updatePassword')->name('profile-password-update');
    });
