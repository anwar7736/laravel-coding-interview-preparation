<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/multi-step-form', [App\Http\Controllers\MultiStepFormController::class, 'create'])->name('create');
Route::post('/stepOne', [App\Http\Controllers\MultiStepFormController::class, 'stepOne'])->name('stepOne');
Route::post('/stepTwo', [App\Http\Controllers\MultiStepFormController::class, 'stepTwo'])->name('stepTwo');
Route::post('/store', [App\Http\Controllers\MultiStepFormController::class, 'store'])->name('store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
