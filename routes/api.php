<?php

use App\Http\Controllers\CountryController1;
use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('countrys1')->group(function () {
    Route::get('',  [CountryController1::class, 'find']);
    Route::get('{id}',  [CountryController1::class, 'findById']);
    Route::post('',  [CountryController1::class, 'create']);
    Route::put('/id}',  [CountryController1::class, 'update']);
    Route::delete('{id}',  [CountryController1::class, 'delete']);
});

Route::apiResource('countrys', CountryController::class);
