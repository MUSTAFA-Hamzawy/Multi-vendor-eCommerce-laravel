<?php

use App\Http\Controllers\User\VendorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| vendor Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'auth.role:vendor'])
    ->prefix('vendor')
    ->name('vendor-')
    ->controller(VendorController::class)->group(function (){

        // dashboard
        Route::view('dashboard', 'backend.vendor.vendor_dashboard')->name('dashboard');

        // profile
        Route::view('profile', 'backend.profile.vendor_profile')->name('profile');
        Route::post('profile/update_info', 'updateInfo')->name('profile-info-update');
        Route::post('profile/update_image', 'updateImage')->name('profile-image-update');
        Route::post('profile/update_password', 'updatePassword')->name('profile-password-update');
    });
