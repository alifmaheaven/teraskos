<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MitraKosController;
use App\Http\Controllers\TipeAdminController;
use App\Http\Controllers\TipeMitraController;

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

Route::group(['prefix' => 'customer'], function ($router) {
    Route::post('signup', [CustomerController::class, 'register']);
    Route::post('signin', [CustomerController::class, 'login']);

    Route::group(['middleware' => 'jwt.verify'], function () {
        Route::post('logout', [CustomerController::class, 'signout']);
        Route::post('token-refresh', [CustomerController::class, 'refresh']);
        Route::get('me', [CustomerController::class, 'user']);
    });
});

Route::group(['prefix' => 'admin'], function ($router) {
    Route::post('signup', [AdminController::class, 'register']);
    Route::post('signin', [AdminController::class, 'login']);

    Route::group(['middleware' => 'jwt.verify'], function () {
        Route::post('logout', [AdminController::class, 'signout']);
        Route::post('token-refresh', [AdminController::class, 'refresh']);
        Route::get('me', [AdminController::class, 'user']);
    });
});

Route::group(['prefix' => 'mitra'], function ($router) {
    Route::post('signup', [MitraKosController::class, 'register']);
    Route::post('signin', [MitraKosController::class, 'login']);

    Route::group(['middleware' => 'jwt.verify'], function () {
        Route::post('logout', [MitraKosController::class, 'signout']);
        Route::post('token-refresh', [MitraKosController::class, 'refresh']);
        Route::get('me', [MitraKosController::class, 'user']);
    });
});

Route::group(['prefix' => 'tipe'], function ($router) {
    Orion::resource('admin', TipeAdminController::class);
    Orion::resource('mitra', TipeMitraController::class);
});