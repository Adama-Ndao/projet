<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

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
Route::get('/etudiant', [EtudiantController::class, 'etudiant'])->name('etudiant');
Route::get('/ajout', [EtudiantController::class, 'ajout'])->name('ajout');
Route::post('/store', [EtudiantController::class, 'store'])->name('store');
