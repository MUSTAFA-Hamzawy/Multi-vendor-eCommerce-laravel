<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'auth.role'])->name('admin-')->group(function (){

    Route::view('dashboard', 'admin_dashboard')->name('dashboard');

});
