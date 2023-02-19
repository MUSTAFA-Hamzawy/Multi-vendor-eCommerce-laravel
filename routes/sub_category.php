<?php

use App\Http\Controllers\SubCategoryController;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Sub Category Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin-')
    ->controller(SubCategoryController::class)->group(function (){
        Route::get('sub_categories', 'subCategoryAdd')->name('sub-category');
        Route::view('add_sub_category', 'backend.sub_category.sub_category_add',
            ['categories' => CategoryModel::all()])->name('sub-category-add');
        Route::post('create_sub_category', 'subCategoryCreate')->name('sub-category-create');
        Route::get('remove_sub_category/{id}', 'subCategoryRemove')->name('sub-category-remove')->whereNumber('id');
        Route::post('update_sub_category', 'subCategoryUpdate')->name('sub-category-update');


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
