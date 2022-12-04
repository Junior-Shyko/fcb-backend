<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use FCB\Http\Controllers\GroupController;

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

Route::prefix('v1')->group(function () {
    Route::get('group' , [GroupController::class, 'index']);
    Route::post('group' , [GroupController::class, 'store']);
    Route::post('group/{id}' , [GroupController::class, 'edit']);
    Route::get('group/{id}' , [GroupController::class, 'show']);
});
