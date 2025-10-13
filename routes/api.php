<?php


use App\Http\Controllers\GadoController;
use Illuminate\Support\Facades\Route;

Route::post('gados/{id}/abater', [GadoController::class, 'abater']);


