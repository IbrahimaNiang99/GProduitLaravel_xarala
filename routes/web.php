<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\ProduitController;
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

    Route::get('/categorie/liste', [CategorieController::class, 'listeCategorie'])->name('listeCategorie');
    Route::post('/categorie/liste', [CategorieController::class, 'addCategorie'])->name('addCategorie');
    Route::get('/categorie/delete/{id}', [CategorieController::class, 'delete'])->name('deleteCategorie');
    Route::get('/categorie/modifier/{id}', [CategorieController::class, 'editCategorie'])->name('editCategorie');
    Route::post('/categorie/updateCategorie', [CategorieController::class, 'updateCategorie'])->name('updateCategorie');
    
    Route::get('/produit/liste', [ProduitController::class, 'listeProduit'])->name('listeProduit');
    Route::post('/produit/liste', [ProduitController::class, 'addProduit'])->name('addProduit');
    Route::get('/produit/modifier/{id}', [ProduitController::class, 'editproduit'])->name('editproduit');
    Route::post('/produit/updateproduit', [ProduitController::class, 'updateproduit'])->name('updateproduit');
    Route::get('/produit/delete/{id}', [ProduitController::class, 'delete'])->name('deleteProduit');

    Route::get('/entree/liste', [EntreeController::class, 'listeEntree'])->name('listeEntree');
    Route::post('/entree/liste', [EntreeController::class, 'ajoutEntree'])->name('ajoutEntree');
    Route::get('/entree/delete/{id}', [EntreeController::class, 'delete'])->name('deleteEntree');
    Route::get('/entree/modifier/{id}', [EntreeController::class, 'editEntree'])->name('editEntree');
    Route::post('/entree/updateEntree', [EntreeController::class, 'updateEntree'])->name('updateEntree');

    Route::get('/sortie/liste', [SortieController::class, 'listeSortie'])->name('listeSortie');
    Route::post('/sortie/liste', [SortieController::class, 'ajoutSortie'])->name('ajoutSortie');
    Route::get('/sortie/delete/{id}', [SortieController::class, 'delete'])->name('deleteSortie');
    Route::get('/sortie/modifier/{id}', [SortieController::class, 'editSortie'])->name('editSortie');
    Route::post('/sortie/updateSortie', [SortieController::class, 'updateSortie'])->name('updateSortie');

});