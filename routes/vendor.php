<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'auth.role'])->name('vendor-')->group(function (){

    Route::view('dashboard', 'vendor_dashboard')->name('dashboard');

});
