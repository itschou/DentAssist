<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsultationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\StatistiquesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'login'])->name('/login');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('client', ClientController::class)->middleware('auth');
Route::get('/clients/search', [ClientController::class, 'search'])->name('client.search')->middleware('auth');

Route::resource('consultation', ConsultationsController::class)->middleware('auth');
Route::get('/consultations/search', [ConsultationsController::class, 'search'])->name('consultation.search')->middleware('auth');

Route::resource('categorie', CategoriesController::class)->middleware('auth');
Route::resource('statistique', StatistiquesController::class)->middleware('auth');


Route::resource('rendez-vous', RendezVousController::class)->middleware('auth'); 
Route::get('rendezvous', [RendezVousController::class, 'showCalendar'])->name('rendezvous.showCalendar')->middleware('auth');
Route::get('/rendezvous/search', [RendezVousController::class, 'search'])->name('rendezvous.search')->middleware('auth');


