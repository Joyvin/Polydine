<?php

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