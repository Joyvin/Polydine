<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('dashboard');
Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

Route::post('/clogin', [App\Http\Controllers\AuthController::class, 'login'])->name('clogin');
Route::post('/vemail', [App\Http\Controllers\AuthController::class, 'validateEmail'])->name('validate.email');
Route::post('/vname', [App\Http\Controllers\AuthController::class, 'validateName'])->name('validate.name');
Route::post('/vpassword', [App\Http\Controllers\AuthController::class, 'validatePassword'])->name('validate.password');
Route::post('/cregister', [App\Http\Controllers\AuthController::class, 'register'])->name('cregister');
Route::get('authorized/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('login-google');
Route::get('authorized/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback']);
