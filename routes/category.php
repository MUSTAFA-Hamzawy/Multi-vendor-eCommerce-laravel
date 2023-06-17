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
    ->controller(CategoryController::class)->group(function (){
        Route::view('categories', 'backend.category.category_default', ['data' => CategoryModel::all()])->name('category');
        Route::view('add_category', 'backend.category.category_add')->name('category-add');
        Route::post('create_category', 'categoryCreate')->name('category-create');
        Route::get('remove_category/{id}', 'categoryRemove')->name('category-remove')->whereNumber('id');
        Route::post('update_category', 'categoryUpdate')->name('category-update');


    });
