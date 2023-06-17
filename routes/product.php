<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

// for admin
Route::middleware(['auth', 'auth.role:admin'])
    ->prefix('admin')
    ->name('admin-')
    ->controller(ProductController::class)->group(function (){

        Route::view('products', 'backend.product.product_default',
            ['data' => DB::table('get_product_data')->get()])
            ->name('product');
        Route::get('remove_product/{id}', 'productRemove')
            ->whereNumber('id')
            ->name('product-remove');

    });

// for vendor
Route::middleware(['auth', 'auth.role:vendor'])
    ->prefix('vendor')
    ->name('vendor-')
    ->controller(ProductController::class)->group(function (){

        Route::get('products', 'getProducts')->name('product');
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
