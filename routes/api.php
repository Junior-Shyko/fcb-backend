<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginJwtController;

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
    Route::delete('group/{id}' , [GroupController::class, 'destroy']);

   
    Route::post('user-group', [GroupUserController::class, 'store']);
    Route::get('user-group/{id}' , [GroupUserController::class, 'show']);
    Route::delete('user-group/{id}' , [GroupUserController::class, 'destroy']);
    Route::get('list-member/{member}' , [UserController::class, 'getMember']);

    Route::post('create-user' , [UserController::class, 'store']);
    Route::post('up-user/{id}' , [UserController::class, 'update']);

    //AUTH
    //PASSANDO MIDDLEWARE DE API POR QUE LA NO AUTH.PHP CONSTA COMO O DEFAULT O WEB
    Route::middleware('api')->group(function () {
        Route::post('login', [LoginJwtController::class, 'login']);
        Route::post('logout', [LoginJwtController::class, 'logout']);
        Route::post('refresh', [LoginJwtController::class, 'refresh']);
        Route::post('me', [LoginJwtController::class, 'me']);
    });

    Route::prefix('user')->group(function () {
        Route::get('count', [UserController::class, 'countGeneral']);
    });
    Route::prefix('groups')->group(function () {
        Route::get('count', [GroupController::class, 'countGeneral']);
    });

    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::get('user-group', [GroupUserController::class, 'index']);
        
    });
    
});
