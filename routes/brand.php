<?php

use App\Http\Controllers\BrandController;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Brand Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin-')
    ->controller(BrandController::class)->group(function (){
        Route::view('brands', 'backend.brand.brand_default', ['data' => BrandModel::all()])->name('brand');
        Route::view('add_brand', 'backend.brand.brand_add')->name('brand-add');
        Route::post('create_brand', 'brandCreate')->name('brand-create');
        Route::get('remove_brand/{id}', 'brandRemove')->name('brand-remove')->whereNumber('id');
        Route::post('update_brand', 'brandUpdate')->name('brand-update');


    });

// for vendor
//Route::middleware(['auth', 'auth.role:vendor'])
//    ->prefix('vendor')
//    ->name('vendor-')
//    ->controller(VendorController::class)->group(function (){
//
//        // dashboard
//        Route::view('dashboard', 'backend.vendor.vendor_dashboard')->name('dashboard');
//
//        // profile
//        Route::view('profile', 'backend.profile.vendor_profile')->name('profile');
//        Route::post('profile/update_info', 'updateInfo')->name('profile-info-update');
//        Route::post('profile/update_image', 'updateImage')->name('profile-image-update');
//        Route::post('profile/update_password', 'updatePassword')->name('profile-password-update');
//    });
