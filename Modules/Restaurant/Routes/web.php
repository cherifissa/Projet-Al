<?php

use Illuminate\Support\Facades\Route;
use Modules\Restaurant\Http\Controllers\ClientRestoController;
use Modules\Restaurant\Http\Controllers\ProduitController;
use Modules\Restaurant\Http\Controllers\ReservationRestoController;
use Modules\Restaurant\Http\Controllers\RestaurantController;
use Modules\Restaurant\Http\Controllers\ServiceController;
use Modules\Restaurant\Http\Controllers\ServiceRestoController;
use Modules\Restaurant\Http\Middleware\RestaurantAccessMiddleware;

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


//restaurant
Route::prefix('restaurant')->middleware([RestaurantAccessMiddleware::class])->group(function () {
    Route::get('/', [RestaurantController::class, 'index']);
    Route::post('cartadd', [RestaurantController::class, 'addToCart'])->name('cartadd');
    Route::post('cartpay', [RestaurantController::class, 'cartpay'])->name('cartpay');
    Route::post('cartremove', [RestaurantController::class, 'removeFromCart'])->name('cartremove');
    Route::post('cartremoveall', [RestaurantController::class, 'removeAllCart'])->name('removeAllCart');
    Route::resource('servicesresto', ServiceRestoController::class)->except('show');
    Route::resource('produits', ProduitController::class)->except('show');
    Route::get('reservations', [ReservationRestoController::class, 'indexrsv'])->name('rsvindex');
    Route::get('clients', [ClientRestoController::class, 'indexclt'])->name('cltindex');
});
