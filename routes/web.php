<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SQLExecuteController;

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

Route::group([
        'prefix' => 'sql-execute', 
        'as' => 'sql_execute.',
        'controller' => SQLExecuteController::class,
        // 'middleware' => 'admin', 
], function () {
        Route::get('/create', 'create')->name('create');
    Route::post('/execute', 'execute')->name('execute');
});
