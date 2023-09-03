<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aut\LoginController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\ProfileCltController;
use Modules\Réservation\Http\Controllers\MessageController;
use Modules\Réservation\Http\Controllers\CommentaireController;
use Modules\Réservation\Http\Controllers\ChambreCategorieController;
use Modules\Réservation\Http\Controllers\ClientReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginaction');
Route::post('/disconnect/{userid}', [LoginController::class, 'disconnect'])->name('disconnect');

//route client
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('clients.accueil.index');
    })->name('accueil');
    Route::get('/reserver', [ClientReservationController::class, 'reserver'])->name('reservationclient');
    Route::resource('message', MessageController::class)->only('store');
    Route::post('commentaire', [CommentaireController::class, 'store'])->name('commentairesend');
    Route::get('dasboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::get('contact', function () {
        return view('clients.contact.contact');
    });
    Route::get('about', function () {
        return view('clients.about.about');
    });
    Route::get('gallery', function () {
        return view('clients.gallery.gallery');
    });
    Route::get('chambre/{chambre}', [ChambreCategorieController::class, 'infos'])->name('chambreinfos');
    Route::get('/chambre', function () {
        return view('clients.chambre.chambre');
    })->name('chambre');
    Route::get('/blog', function () {
        return view('clients.blog.blog');
    });
    Route::post('changeasswordclt/{id}', [ProfileCltController::class, 'changePassword'])->name('changeasswordclt');

    Route::resource('profileclt', ProfileCltController::class)->only('update', 'index');
});
