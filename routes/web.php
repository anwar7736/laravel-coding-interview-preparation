<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SQLExecuteController;
use App\Modules\Product\Models\Brand;
use Illuminate\Support\Facades\DB;

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

Route::group(['prefix' => 'database-replication', 'as' => 'database-replication'], function(){
        Route::get('list-brands', function(){
                // dd(DB::select("SELECT @@port as port"));
                $brands = Brand::active()
                ->select(
                        'id',
                        'name',
                        'short_description',
                        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %h:%i') as created_date")
                )
                ->latest('id')
                ->get();

                return response([
                  'success' => true,
                  'data'    => $brands
                ]);
        });

        Route::get('add-brand', function(){
                $brand = Brand::create([
                        'name' => 'MY NEW TEST BRAND '.rand(111111,999999),
                        ''
                ]);
                
                return response([
                  'success' => true,
                  'message' => "New brand added successfully",
                  'data'    => $brand
                ]);
        });
});
