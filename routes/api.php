<?php

use App\Http\Controllers\Api\PropertyController;
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

Route::get(
    'properties',
    [PropertyController::class, 'index']
)->name('api.properties.index');

Route::post(
    'properties',
    [PropertyController::class, 'store']
)->name('api.properties.store');

Route::put(
    'properties/{property}',
    [PropertyController::class, 'update']
)->name('api.properties.update');
