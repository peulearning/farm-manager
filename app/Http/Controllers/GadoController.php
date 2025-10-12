<?php

namespace App\Http\Controllers;

use App\Models\Gado;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GadoController extends Controller
{
    public function listarParaAbate()
    {
        $gados = Gado::all()->filter(function ($gado) {
            return $gado->podeSerAbatido();
        });

        return response()->json($gados);
    }
}
