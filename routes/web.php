<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/politique/privacy', function () {return view('politique.privacy');})->name('politique.privacy');
Route::get('/politique/conditions', function () {return view('politique.conditions');})->name('politique.conditions');