<?php

use App\Http\Controllers\BrandController;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Brand Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->controller(BrandController::class)->group(function (){
        Route::view('brands', 'backend.brand.brand_default', ['data' => BrandModel::all()])->name('brand');
        Route::view('add_brand', 'backend.brand.brand_add')->name('brand-add');
        Route::post('create_brand', 'brandCreate')->name('brand-create');
        Route::get('remove_brand/{id}', 'brandRemove')->name('brand-remove')->whereNumber('id');
        Route::post('update_brand', 'brandUpdate')->name('brand-update');
    });
