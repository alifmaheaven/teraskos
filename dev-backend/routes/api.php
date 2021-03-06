<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MitraKosController;
use App\Http\Controllers\TipeAdminController;
use App\Http\Controllers\TipeMitraController;
use App\Http\Controllers\IsiKemitraanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\HargaKamarController;

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
    Route::get('admin', [TipeAdminController::class, 'index']);
    Route::get('admin/{tipeID}', [TipeAdminController::class, 'show']);
    Route::post('admin', [TipeAdminController::class, 'store']);
    Route::put('admin/{tipeID}', [TipeAdminController::class, 'update']);
    Route::delete('admin/{tipeID}', [TipeAdminController::class, 'delete']);

    Route::get('mitra', [TipeMitraController::class, 'index']);
    Route::get('mitra/{MitraID}', [TipeMitraController::class, 'show']);
    Route::post('mitra', [TipeMitraController::class, 'store']);
    Route::put('mitra/{MitraID}', [TipeMitraController::class, 'update']);
    Route::delete('mitra/{MitraID}', [TipeMitraController::class, 'delete']);

    Route::get('isimitra', [IsiKemitraanController::class, 'index']);
    Route::get('isimitra/{PaketID}', [IsiKemitraanController::class, 'showByID']);
    Route::get('isimitra/detail/{IsiPaketID}', [IsiKemitraanController::class, 'detail']);
    Route::post('isimitra', [IsiKemitraanController::class, 'store']);
    Route::put('isimitra/{IsiPaketID}', [IsiKemitraanController::class, 'update']);
    Route::delete('isimitra/{IsiPaketID}', [IsiKemitraanController::class, 'delete']);
});

Route::group(['prefix' => 'kost'], function ($router) {
    Route::get('fasilitas', [FasilitasController::class, 'index']);
    Route::get('fasilitas/{fasilitasID}', [FasilitasController::class, 'show']);
    Route::post('fasilitas', [FasilitasController::class, 'store']);
    Route::put('fasilitas/{fasilitasID}', [FasilitasController::class, 'update']);
    Route::delete('fasilitas/{fasilitasID}', [FasilitasController::class, 'delete']);

    Route::get('all', [KostController::class, 'index']);
    Route::get('all/{MitraID}', [KostController::class, 'showbyID']);
    Route::get('show/{KostID}', [KostController::class, 'show']);
    Route::post('add', [KostController::class, 'store']);
    Route::put('update/{KostID}', [KostController::class, 'update']);
    Route::delete('delete/{KostID}', [KostController::class, 'delete']);
});

Route::prefix('kamar')->group(function ($router) {
    Route::get('all', [KamarController::class, 'index']);
    Route::get('kost/{KostID}',  [KamarController::class, 'showbyID']);
    Route::get('detail/{KamarID}', [KamarController::class, 'detail']);
    Route::post('add', [KamarController::class, 'store']);
    Route::put('update/{KamarID}', [KamarController::class, 'update']);
    Route::delete('delete/{KamarID}',[KamarController::class, 'delete']);

    Route::get('fasilitas', [FasilitasKamarController::class, 'index']);
    Route::get('fasilitas/{KamarID}', [FasilitasKamarController::class, 'show']);
    Route::get('fasilitas/detail/{FasilID}', [FasilitasKamarController::class, 'detail']);
    Route::post('fasilitas', [FasilitasKamarController::class, 'store']);
    Route::put('fasilitas/{FasilID}', [FasilitasKamarController::class, 'update']);
    Route::delete('fasilitas/{FasilID}', [FasilitasKamarController::class, 'delete']);

    Route::get('harga/{KamarID}', [HargaKamarController::class, 'index']);
    Route::get('harga/detail/{HargaID}', [HargaKamarController::class, 'show']);
    Route::post('harga', [HargaKamarController::class, 'store']);
    Route::put('harga/{HargaID}', [HargaKamarController::class, 'update']);
    Route::delete('harga/{HargaID}', [HargaKamarController::class, 'delete']);
});