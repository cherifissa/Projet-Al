<?php

use Illuminate\Support\Facades\Route;
use Modules\LouangeBar\Http\Controllers\ClientLouangeController;
use Modules\LouangeBar\Http\Middleware\LouanBarMiddleware;
use Modules\LouangeBar\Http\Controllers\LouangeBarController;
use Modules\LouangeBar\Http\Controllers\ProduitLouangeController;
use Modules\LouangeBar\Http\Controllers\ProfileBarController;
use Modules\LouangeBar\Http\Controllers\ReservationLouangeController;
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
    Route::get('/', [LouangeBarController::class, 'index'])->name('louangeindex');
    Route::post('cartadd', [LouangeBarController::class, 'addToCartbar'])->name('cartaddbar');
    Route::post('cartpay', [LouangeBarController::class, 'cartpay'])->name('cartpay');
    Route::post('cartremove', [LouangeBarController::class, 'removeFromCart'])->name('cartremovebar');
    Route::post('cartremoveall', [LouangeBarController::class, 'removeAllCart'])->name('removeAllCartbar');
    Route::resource('serviceslouange', ServiceLouangeController::class)->except('show');
    Route::resource('produits', ProduitLouangeController::class)->except('show');
    Route::get('reservations', [ReservationLouangeController::class, 'indexrsv'])->name('rsvindexbar');
    Route::get('clients', [ClientLouangeController::class, 'indexclt'])->name('cltindexbar');
    Route::resource('profilebar', ProfileBarController::class)->only('update', 'index');
    Route::post('changePasswordbar/{id}', [ProfileBarController::class, 'changePassword'])->name('changepasswordbar');
});
