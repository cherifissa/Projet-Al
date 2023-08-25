<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aut\LoginController;

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
    Route::resource('/message', MessageController::class)->only('store');
    Route::post('commentaire', [CommentaireController::class, 'store'])->name('commentairesend');
    Route::get('/dasboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::get('/contact', function () {
        return view('clients.contact.contact');
    });
    Route::get('/about', function () {
        return view('clients.about.about');
    });
    Route::get('/gallery', function () {
        return view('clients.gallery.gallery');
    });
    Route::get('/chambre/{chambre}', [ChambreCategorieController::class, 'infos'])->name('chambreinfos');
    Route::get('/chambre', function () {
        return view('clients.chambre.chambre');
    })->name('chambre');
    Route::get('/blog', function () {
        return view('clients.blog.blog');
    });
});
