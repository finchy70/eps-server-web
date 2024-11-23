<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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



Route::post('/sanctum/token', [TokenController::class, 'token'])->name('token');

Route::middleware('auth:sanctum')->post('/inspections', [DataController::class, 'inspections'])->name('inspections');
Route::middleware('auth:sanctum')->post('/pictures', [DataController::class, 'pictures'])->name('pictures');
Route::middleware('auth:sanctum')->get('/data', [DataController::class, 'data'])->name('data');
