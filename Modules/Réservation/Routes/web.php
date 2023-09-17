<?php

use Illuminate\Support\Facades\Route;
use Modules\Réservation\Http\Controllers\UserController;
use Modules\Réservation\Http\Controllers\AdminController;
use Modules\Réservation\Http\Controllers\ChambreController;
use Modules\Réservation\Http\Controllers\FactureController;
use Modules\Réservation\Http\Controllers\MessageController;
use Modules\Réservation\Http\Controllers\ProfileController;
use Modules\Réservation\Http\Middleware\AdminAccessMiddleware;
use Modules\Réservation\Http\Controllers\CommentaireController;
use Modules\Réservation\Http\Controllers\ReservationController;
use Modules\Réservation\Http\Controllers\StatistiqueController;
use Modules\Réservation\Http\Middleware\ReceptAccessMiddleware;
use Modules\Réservation\Http\Controllers\ChambreCategorieController;
use Modules\Réservation\Http\Controllers\DemandeReservationController;

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


Route::prefix('reservation')->middleware([ReceptAccessMiddleware::class])->group(function () {

    Route::get('/', function () {
        return view('réservation::manager.index');
    });
    Route::get('rapport', [FactureController::class, 'rapport'])->name('rapport');
    Route::post('facture/{reservation}', [FactureController::class, 'index'])->name('facture');
    Route::get('print_facture/{reservation}', [FactureController::class, 'print'])->name('factureprint');
    Route::get('chambres', [ChambreController::class, 'index'])->name('chambrerecept');
    Route::get('demandes', [DemandeReservationController::class, 'index'])->name('demandes');
    Route::get('demandes/delete/{id}', [DemandeReservationController::class, 'destroy'])->name('demande.destroy');
    Route::get('demande/accepte/{id}', [DemandeReservationController::class, 'accepter'])->name('mailmessage');
    Route::get('demande/reject/{id}', [DemandeReservationController::class, 'reject'])->name('mailmessagereject');
    Route::resource('/messages', MessageController::class)->only('index', 'destroy');
    Route::resource('profile', ProfileController::class)->only('update', 'index');
    Route::post('changePassword/{id}', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::resource('clients', ClientController::class)->only('index');
    Route::resource('users', UserController::class)->except('show');
    Route::resource('commentaires', CommentaireController::class)->only('index', 'destroy');
    Route::resource('reservations', ReservationController::class)->except('show');
    Route::post('pay/{reservation}', [ReservationController::class, 'pay'])->name('pay');
    Route::resource('admins', AdminController::class)->only('index');
    Route::get('statistiques', [StatistiqueController::class, 'index'])->name('statistiques');
    Route::resource('chambres', ChambreController::class)->except('show');
    Route::resource('chambre_categories', ChambreCategorieController::class)->except('show');
});
//route admin
// Route::prefix('admin')->middleware([AdminAccessMiddleware::class])->group($adminAndReceptRoutes);
// Route::prefix('admin')->middleware([AdminAccessMiddleware::class])->group($adminRoutes);