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
    ->controller(SubCategoryController::class)->group(function (){
        Route::get('sub_categories', 'subCategoryAdd')->name('sub-category');
        Route::view('add_sub_category', 'backend.sub_category.sub_category_add',
            ['categories' => CategoryModel::all()])->name('sub-category-add');
        Route::post('create_sub_category', 'subCategoryCreate')->name('sub-category-create');
        Route::get('remove_sub_category/{id}', 'subCategoryRemove')->name('sub-category-remove')->whereNumber('id');
        Route::post('update_sub_category', 'subCategoryUpdate')->name('sub-category-update');


    });
