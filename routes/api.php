<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/filter/{id}', 'filter');
    Route::get('/category', 'index');
    Route::get('/category/{id}', 'show');
    Route::post('/category', 'store');
    Route::put('/category/{id}', 'update');
    Route::delete('/category/{id}', 'destroy');
});

Route::controller(LotController::class)->group(function () {
    Route::get('/lot', 'index');
    Route::get('/lot/{id}', 'show');
    Route::post('/lot', 'store');
    Route::put('/lot/{id}', 'update');
    Route::delete('/lot/{id}', 'destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
