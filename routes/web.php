<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\DecaissementController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ReconciliationController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource("projet",ProjetController::class);
Route::resource("bureau",BureauController::class);
Route::resource("decaissement",DecaissementController::class);
Route::resource("affectation",AffectationController::class);
Route::resource("reconciliation",ReconciliationController::class);

Route::get('/bureau/by/projet/{id}', [BureauController::class,'getByProjet']);
Route::get('/decaissement/by/projet/{id}', [DecaissementController::class,'getByProjet']);
