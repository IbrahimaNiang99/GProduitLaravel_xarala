<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RVController;
use App\Http\Controllers\SortieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();


Route::middleware(['secure.after.logout'])->group(function () {
    // Your protected routes here
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


Route::middleware(['secure.after.logout'])->group(function () {
    Route::get('/rv/liste', [RVController::class, 'listerv'])->name('listerv');
    Route::get('/medecin/liste', [MedecinController::class, 'listemedecin'])->name('listemedecin');

});