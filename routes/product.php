<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

//Route::middleware(['auth'])
//    ->prefix('admin')
//    ->name('admin-')
//    ->controller(BrandController::class)->group(function (){
//        Route::view('brands', 'backend.brand.brand_default', ['data' => BrandModel::all()])->name('brand');
//        Route::view('add_brand', 'backend.brand.brand_add')->name('brand-add');
//        Route::post('create_brand', 'brandCreate')->name('brand-create');
//        Route::get('remove_brand/{id}', 'brandRemove')->name('brand-remove')->whereNumber('id');
//        Route::post('update_brand', 'brandUpdate')->name('brand-update');
//
//
//    });

// for vendor
Route::middleware(['auth', 'auth.role:vendor'])
    ->prefix('vendor')
    ->name('vendor-')
    ->controller(ProductController::class)->group(function (){

        Route::view('products', 'backend.product.product_default',
            ['data' => DB::table('get_product_data')->get()])
            ->name('product');
        Route::get('add_product', 'productAdd')->name('product-add');
        Route::post('create_product', 'productCreate')->name('product-create');
        Route::get('remove_product/{id}', 'productRemove')
            ->whereNumber('id')
            ->name('product-remove');
        Route::get('edit_product/{id}', 'productEdit')
            ->whereNumber('id')->name('product-edit');
        Route::post('update_product/{id}', 'productUpdate')
            ->whereNumber('id')->name('product-update');
        Route::post('activate_product', 'productActivate')->name('product-activate');

    });
