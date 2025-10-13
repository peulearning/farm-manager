<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gado;

class GadoController extends Controller
{
    public function abater($id)
    {
        try {
            $gado = Gado::findOrFail($id);

            // Verifica se o gado pode ser abatido
            if (!$gado->podeSerAbatido()) {
                return response()->json([
                    'error' => 'O animal não se enquadra nas condições de abate.'
                ], 400);
            }

            // Abate o gado
            $gado->abater();

            return response()->json([
                'message' => '✅ Animal abatido com sucesso!',
                'animal' => $gado
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }


    public function relatorioAbatidos(){
        $animaisAbatidos = Gado::whereNotNull('data_abate')->get();

        return view('relatorios.abatidos', compact('animaisAbatidos'));
    }
}
