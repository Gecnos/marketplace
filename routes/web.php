<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/auth/login', 'auth.login')->name('auth.login');
Route::view('/auth/register', 'auth.register')->name('auth.register');
