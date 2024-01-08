<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\listeController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\AchatClientController;

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

//Route::get('/', [PostController::class, 'index']);

//AGENCE 
Route::get('/agence', [AgenceController::class, 'index'])->name('agence.index');
Route::get('/agence/create', [AgenceController::class, 'create'])->name('agence.create');
Route::post('/agence', [AgenceController::class, 'store'])->name('agence.store');
Route::get('/agence/{id}/edit', [AgenceController::class, 'edit'])->name('agence.edit');
Route::get('/agence/{agenc}', [AgenceController::class, 'show'])->name('agence.show');
Route::post('/agence/{agenc}', [AgenceController::class, 'update'])->name('agence.update');
Route::get('/agenceDel/{id}', [AgenceController::class, 'destroy'])->name('agence.destroy');


//CITE
Route::get('/citeAgence/{id}', [CiteController::class, 'index'])->name('cite.index');
Route::get('/cite/create/{id}', [CiteController::class, 'create'])->name('cite.create');
Route::get('/cite/{id}', [CiteController::class, 'store'])->name('cite.store');
Route::get('/cite/{numcit}/Edit', [CiteController::class, 'edit'])->name('cite.edit');
Route::get('/cite/update/{id}', [CiteController::class, 'update'])->name('cite.update');
Route::get('/citeDel/{id}', [CiteController::class, 'destroy'])->name('cite.destroy');


//LOGEMENT
Route::get('/logement/{id}', [LogementController::class, 'index'])->name('logement.index');
Route::get('/logement/create/{id}', [LogementController::class, 'create'])->name('logement.create');
Route::get('/logement/save/{id}', [LogementController::class, 'store'])->name('logement.store');
Route::get('/logement/edit/{id}', [LogementController::class, 'edit'])->name('logement.edit');
Route::get('/logement/update/{id}', [LogementController::class, 'update'])->name('logement.update');
Route::get('/logementDel/{id}', [LogementController::class, 'destroy'])->name('logement.destroy');

//CLIENT
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::get('/clientDel/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

//ACHAT
Route::get('/achat', [AchatClientController::class, 'index'])->name('achat.index');
Route::get('/achat/show', [AchatClientController::class, 'show'])->name('achat.show');
Route::get('/achat/showCli', [AchatClientController::class, 'showCli'])->name('achat.showCli');
Route::get('/achat/store', [AchatClientController::class, 'store'])->name('achat.store');


//LISTE DES ACHATS
Route::get('/liste', [listeController::class, 'index'])->name('liste.index');
Route::get('/liste/{id}', [listeController::class, 'show'])->name('liste.show');
Route::get('/liste/{id}/pdf', [listeController::class, 'convert'])->name('liste.convert');
Route::get('/liste/delete/{id}', [listeController::class, 'destroy'])->name('liste.destroy');
