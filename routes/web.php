<?php

use App\Http\Controllers\GadoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// Desabilitar CSRF diretamente na rota não é recomendado por questões de segurança.
// Mas, se realmente precisar, pode adicionar a rota ao grupo 'web' e excluir do middleware 'VerifyCsrfToken'.
// No entanto, isso é feito no arquivo app/Http/Middleware/VerifyCsrfToken.php, não aqui na rota.

// Apenas adicionando a rota normalmente:
Route::post('/gados/{id}/abater', [GadoController::class, 'abater'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
