<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiltreController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/liste/filieres', [FiliereController::class, 'index']);//liste des filières
Route::post('/liste/filieres', [FiliereController::class, 'store']);//enrégistrer une filière
Route::get('/edit/filiere/{id}', [FiliereController::class, 'edit']);//editer une filière
Route::patch('/liste/filieres/{id}', [FiliereController::class, 'update']);//modifier une filière
Route::delete('/liste/filieres/{id}', [FiliereController::class, 'destroy']);//supprimer une filière

Route::get('/liste/etudiants', [EtudiantController::class, 'index']);//liste des étudiants
Route::post('/liste/etudiants', [EtudiantController::class, 'store']);//enrégistrer un étudiant
Route::get('/edit/etudiant/{id}', [EtudiantController::class, 'edit']);//editer un étudiant
Route::patch('/liste/etudiants/{id}', [EtudiantController::class, 'update']);//modifier les informations sur un étudiant
Route::delete('/liste/etudiants/{id}', [EtudiantController::class, 'destroy']);//supprimer un étudiant

Route::get('/liste/deroulante', [FiltreController::class, 'index']);
Route::get('/filiere/{id}', [FiltreController::class, 'getFiliere']);
Route::get('/etudiants', [FiltreController::class, 'getEtudiants']);