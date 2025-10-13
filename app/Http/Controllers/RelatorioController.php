<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gado;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function inicial()
    {
        // Total de leite por semana
        $totalLeiteSemana = Gado::sum('leite') * 7;

        // Total de ração por semana
        $totalRacaoSemana = Gado::sum('racao') * 7;

        // Quantidade de animais jovens (<= 1 ano) e que consomem > 500kg ração por semana
        $quantidadeJovensRacao = Gado::all()->filter(function($gado) {
            $idade = \Carbon\Carbon::parse($gado->data_nascimento)->age;
            $racaoSemana = $gado->racao * 7;
            return $idade <= 1 && $racaoSemana > 500;
        })->count();

        // Total de animais abatidos
        $totalAbatidos = Gado::where('vivo', false)->count();

        return view(
            'relatorios.inicial',
            compact('totalLeiteSemana', 'totalRacaoSemana', 'quantidadeJovensRacao', 'totalAbatidos')
        );
    }
}




