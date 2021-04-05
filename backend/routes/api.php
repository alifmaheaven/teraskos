<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UploadController;

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

Route::group(['prefix' => 'auth'], function ($router) {
    $router->post('register', [AuthController::class, 'register']);
    $router->post('login', [AuthController::class, 'login']);
    $router->post('loginGoogle', [AuthController::class, 'loginGoogle']);
    $router->post('requestforget', [AuthController::class, 'sendRequestForget']);
    Route::group(['middleware' => 'jwt.verify'], function ($router) {
        $router->post('logout', [AuthController::class, 'logout']);
        $router->post('refresh', [AuthController::class, 'refresh']);
        $router->post('me', [AuthController::class, 'me']);
        $router->post('varifyuser', [AuthController::class, 'verifyUser']);
        $router->post('changepassword', [AuthController::class, 'changePassword']);
        $router->put('changeprofile', [AuthController::class, 'changeProfile']);
    });
});

Route::group(['prefix' => 'type'], function ($router) {
    Route::group(['middleware' => 'jwt.verify'], function ($router) {
        $router->get('', [TypeController::class, 'index']);
        $router->get('/{id}', [TypeController::class, 'show']);
        $router->post('', [TypeController::class, 'store']);
        $router->put('', [TypeController::class, 'update']);
        $router->delete('', [TypeController::class, 'destroy']);
    });
});

Route::group(['prefix' => 'account'], function ($router) {
    Route::group(['middleware' => 'jwt.verify'], function ($router) {
        $router->get('', [AccountController::class, 'index']);
        $router->get('/{id}', [AccountController::class, 'show']);
        $router->post('', [AccountController::class, 'store']);
        $router->put('', [AccountController::class, 'update']);
        $router->delete('', [AccountController::class, 'destroy']);
    });
});

Route::group(['prefix' => 'transaction'], function ($router) {
    Route::group(['middleware' => 'jwt.verify'], function ($router) {
        $router->get('', [TransactionController::class, 'index']);
        $router->get('/{id}', [TransactionController::class, 'show']);
        $router->post('', [TransactionController::class, 'store']);
        $router->put('', [TransactionController::class, 'update']);
        $router->delete('', [TransactionController::class, 'destroy']);
    });
});

Route::group(['prefix' => 'dashboard'], function ($router) {
    Route::group(['middleware' => 'jwt.verify'], function ($router) {
        $router->get('type-nominal-this-month-only', [DashboardController::class, 'typeNominalThisMonthOnly']);
        $router->get('type-nominal-monthly', [DashboardController::class, 'typeNominalMonthly']);
        $router->get('account-nominal-this-month-only', [DashboardController::class, 'accountNominalThisMonthOnly']);
    });
});

Route::group(['prefix' => 'upload'], function ($router) {
    $router->get('/{uniqid}', [UploadController::class, 'show']);
    Route::group(['middleware' => 'jwt.verify'], function ($router) {
        $router->post('', [UploadController::class, 'store']);
    });
});
