<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;


Route::get ('/', function () {return view('welcome');})->name('welcome');

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/politique/privacy', function () {return view('politique.privacy');})->name('politique.privacy');
Route::get('/politique/conditions', function () {return view('politique.conditions');})->name('politique.conditions');
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::get('/search', [HomeController::class, 'search'])->name('search.results');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');
