<?php

use App\Http\Controllers\CategoryController;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin-')
    ->controller(CategoryController::class)->group(function (){
        Route::view('categories', 'backend.category.category_default', ['data' => CategoryModel::all()])->name('category');
        Route::view('add_category', 'backend.category.category_add')->name('category-add');
        Route::post('create_category', 'categoryCreate')->name('category-create');
        Route::get('remove_category/{id}', 'categoryRemove')->name('category-remove')->whereNumber('id');
        Route::post('update_category', 'categoryUpdate')->name('category-update');


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
