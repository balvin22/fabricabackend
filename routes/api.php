<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactiontypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api'
], function ($router) {

    // Route::post('login',[AuthController::class,'login'])->withoutMiddleware(['api']);
    // Route::post('logout', [AuthController::class,'logout']);
    // Route::post('refresh', [AuthController::class,'refresh']);
    // Route::post('me', [AuthController::class,'me']);
     Route::resource('Transacciones',TransactionController::class);
     Route::resource('TipoTransacciones',TransactiontypeController::class);

});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::resource('Transacciones',TransactionController::class);

// Route::resource('TipoTransacciones',TransactiontypeController::class);
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',[AuthController::class,'login'])->withoutMiddleware(['auth:api']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});
