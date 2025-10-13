<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GadoController;


Route::post('gados/{id}/abater', [GadoController::class, 'abater']);

