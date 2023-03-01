<?php

use App\Models\DeclaracionEcuador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('search/producto', [HomeController::class, 'searchProducto'])->name('search.producto');
    Route::get('search/marca', [HomeController::class, 'searchMarca'])->name('search.marca');
    Route::get('search/ruc', [HomeController::class, 'searchRuc'])->name('search.ruc');
    Route::get('search/nave', [HomeController::class, 'searchNave'])->name('search.nave');
    Route::get('search/embarcadorConsigne', [HomeController::class, 'searchEmbarcadorConsigne'])->name('search.embarcadorConsigne');
    Route::get('search/refrendo', [HomeController::class, 'searchRefrendo'])->name('search.refrendo');
    Route::get('search/agenteAfianzado', [HomeController::class, 'searchAgenteAduana'])->name('search.agenteAfianzado');
    Route::get('search/linea', [HomeController::class, 'searchTransporte'])->name('search.linea');
    Route::get('search/almacen', [HomeController::class, 'searchAlmacen'])->name('search.almacen');
    Route::get('search/subpartida', [HomeController::class, 'searchPartidaArancel'])->name('search.subpartida');
});

