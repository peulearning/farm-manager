<?php

use App\Http\Controllers\GadoController;
use App\Http\Controllers\FazendaController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// Add the correct import for FazendaController if it exists in a different namespace
// use App\Http\Controllers\FazendaController;


Route::get('/', function () {
    return view('welcome');
});




// ============================ REGRAS DE NEGÓCIO ============================
Route::post('/gados/{id}/abater', [GadoController::class, 'abater'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);




// ============================ RELATÓRIOS ============================
Route::get('/relatorios/abatidos', [GadoController::class, 'relatorioAbatidos'])->name('relatorios.abatidos');
Route::get('/relatorios/inicial', [RelatorioController::class, 'inicial'])->name('relatorios.inicial');





// ============================ CRUD GADO ============================
Route::resource('gados', GadoController::class);

// ============================ CRUD FAZENDA ============================
Route::resource('fazendas', FazendaController::class);

// ============================ CRUD VETERINARIO ============================
Route::resource('veterinarios', VeterinarioController::class);
