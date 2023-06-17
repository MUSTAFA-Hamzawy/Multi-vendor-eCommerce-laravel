<?php

use App\Http\Controllers\CouponController;
use App\Models\CouponModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Coupon Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('vendor')
    ->name('vendor-')
    ->controller(CouponController::class)->group(function (){
        Route::get('coupons', 'getAllCoupons')->name('coupon');
        Route::view('add_coupon', 'backend.coupon.coupon_add')->name('coupon-add');
        Route::post('create_coupon', 'couponCreate')->name('coupon-create');
        Route::get('remove_coupon/{id}', 'couponRemove')->name('coupon-remove')->whereNumber('id');
        Route::post('update_coupon', 'couponUpdate')->name('coupon-update');

    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin-')
    ->controller(CouponController::class)->group(function (){
        Route::get('coupons', 'getAllCoupons')->name('coupon');
        Route::get('remove_coupon/{id}', 'couponRemove')->name('coupon-remove')->whereNumber('id');
    });
