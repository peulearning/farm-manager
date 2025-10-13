<?php

use App\Http\Controllers\GadoController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ============================ REGRAS DE NEGÓCIO ============================
Route::post('/gados/{id}/abater', [GadoController::class, 'abater'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);




// ============================ RELATÓRIOS ============================
Route::get('/relatorios/abatidos', [GadoController::class, 'relatorioAbatidos'])->name('relatorios.abatidos');
Route::get('/relatorios/inicial', [RelatorioController::class, 'inicial'])->name('relatorios.inicial');

