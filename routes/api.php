<?php

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

Route::get('/countrys',  [CountryController::class, 'find']);
Route::get('/countrys/{id}',  [CountryController::class, 'findById']);
Route::post('/countrys',  [CountryController::class, 'create']);
Route::put('/countrys/{id}',  [CountryController::class, 'update']);
Route::delete('/countrys/{id}',  [CountryController::class, 'delete']);