<?php

use Illuminate\Support\Facades\Route;
use Modules\LouangeBar\Http\Middleware\LouanBarMiddleware;
use Modules\Réservation\Http\Controllers\ClientController;
use Modules\LouangeBar\Http\Controllers\LouangeBarController;
use Modules\Réservation\Http\Controllers\ReservationController;
use Modules\LouangeBar\Http\Controllers\ProduitLouangeController;
use Modules\LouangeBar\Http\Controllers\ServiceLouangeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('louangebar')->middleware([LouanBarMiddleware::class])->group(function () {
    Route::get('/', [LouangeBarController::class, 'index']);
    Route::post('cartadd', [LouangeBarController::class, 'addToCart'])->name('cartadd');
    Route::post('cartpay', [LouangeBarController::class, 'cartpay'])->name('cartpay');
    Route::post('cartremove', [LouangeBarController::class, 'removeFromCart'])->name('cartremove');
    Route::post('cartremoveall', [LouangeBarController::class, 'removeAllCart'])->name('removeAllCart');
    Route::resource('services', ServiceLouangeController::class)->except('show');
    Route::resource('produits', ProduitLouangeController::class)->except('show');
    Route::get('reservations', [ReservationController::class, 'indexrsv'])->name('rsvindexbar');
    Route::get('clients', [ClientController::class, 'indexclt'])->name('cltindexbar');
});
