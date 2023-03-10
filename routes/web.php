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

Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index'])->name('group');
Route::get('/create-group', [App\Http\Controllers\GroupController::class, 'indexCreate'])->name('show.create.group');
Route::post('/create-group', [App\Http\Controllers\GroupController::class, 'create'])->name('create.group');
Route::post('/get-group', [App\Http\Controllers\GroupController::class, 'getGroup'])->name('get.group');

Route::get('/plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plan');
Route::get('/create-plan', [App\Http\Controllers\PlanController::class, 'indexCreate'])->name('show.create.plan');
Route::post('/create-plan', [App\Http\Controllers\PlanController::class, 'create'])->name('create.plan');
Route::get('/join-plan', [App\Http\Controllers\PlanController::class, 'indexJoin'])->name('show.join.plan');
Route::post('/join-plan-user', [App\Http\Controllers\PlanController::class, 'joinPlan'])->name('join.plan');
Route::post('/get-plans', [App\Http\Controllers\PlanController::class, 'getPlans'])->name('get.plan');

Route::post('/get-sms', [App\Http\Controllers\MessageController::class, 'getMessage'])->name('get.sms');
Route::post('/create-sms', [App\Http\Controllers\MessageController::class, 'create'])->name('create.sms');

Route::post('/give-opinion', [App\Http\Controllers\OpinionController::class, 'changeOp'])->name('give.opinion');
Route::post('/get-spot', [App\Http\Controllers\OpinionController::class, 'getSpot'])->name('get.spot');