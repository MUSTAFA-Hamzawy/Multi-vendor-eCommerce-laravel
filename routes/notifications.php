<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Notifications Routes
|--------------------------------------------------------------------------
*/

Route::get('/readAllNotifications', function (){
    Auth::user()->unreadNotifications->markAsRead();
})->middleware(['auth'])->name('read-all-notifications');
