<?php

use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Social Auth Routes
|--------------------------------------------------------------------------
*/

Route::prefix('social_auth')->controller(SocialiteController::class)
    ->group(function (){
       Route::get('google', 'redirectToGoogle')->name('google-redirect');
       Route::get('google/callback', 'googleCallback')->name('google-callback');
    });
