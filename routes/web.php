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

<<<<<<< HEAD
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
=======
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/create-group', function () {
    return view('createGroup');
});

Route::get('/create-plan', function () {
    return view('createPlan');
});

Route::get('/join-plan', function () {
    return view('joinPlan');
});
>>>>>>> 1904707c4d8c430034ec336bd5e587dbcc65027c
