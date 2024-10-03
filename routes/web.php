<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ConsultasController;
use App\Models\DeclaracionEcuador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportadorController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Setings\SetingUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SelectController;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Select;

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes(["register" => false, "reset" => false, 'verify' => false]);
Route::get('admin/redirect/{id}', [LoginController::class, 'redirectUser'])->name('admin.redirect');

Route::middleware(['auth', 'verified', 'infoaduana'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('admin/home', HomeController::class)->names('admin.home');
    Route::get('back', [HomeController::class, 'back'])->name('back');
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
    Route::get('search/aduanas', [HomeController::class, 'searchAduana'])->name('search.aduanas');
    Route::get('search/via', [HomeController::class, 'searchVia'])->name('search.via');
    Route::get('search/paisOrigen', [HomeController::class, 'searchPaisOrigen'])->name('search.paisOrigen');
    Route::get('search/incoterm', [HomeController::class, 'searchIncoterm'])->name('search.incoterm');

    Route::resource('admin/consulta', ConsultasController::class)->names('admin.consulta');
    Route::resource('admin/users', UserController::class)->names('admin.users');
    Route::resource('admin/charts', ChartsController::class)->names('admin.charts');
    Route::resource('/roles', RolesController::class)->names('admin.roles');
    Route::get('suit', [UserController::class, 'redirectSuit'])->name('suit');

    Route::get("/select", [SelectController::class, 'index'])->name('select.index');


    Route::get("/importador", [ImportadorController::class, 'index'])->name('importador.index');
    Route::get("/importador/colombia", [ImportadorController::class, 'colombia'])->name('importador.colombia');
    Route::post("/importador", [ImportadorController::class, 'store'])->name('importador.store');

    Route::get('/import-progress', [ImportadorController::class, 'getProgress']);
});
