<?php

use App\Http\Controllers\User\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'auth.role:admin'])
    ->prefix('admin')
    ->name('admin-')
    ->controller(AdminController::class)->group(function (){

    // dashboard
    Route::view('dashboard', 'backend.admin.admin_dashboard')->name('dashboard');

    // fallback
    Route::fallback(function (){
        return redirect('/admin/dashboard');
    })->name('brand-fallback');
});
