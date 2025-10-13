@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relatórios Semanais</h1>

    <div>
        <h2>Total de Leite Produzido por Semana</h2>
        <p>
            A quantidade total de leite produzido por todos os animais na semana é:
            <strong>{{ $totalLeiteSemana }} litros</strong>
        </p>
    </div>

    <div>
        <h2>Total de Ração Necessária por Semana</h2>
        <p>
            A quantidade total de ração necessária para todos os animais na semana é:
            <strong>{{ $totalRacaoSemana }} kg</strong>
        </p>
    </div>
</div>
<div>
        <h2>Animais Jovens com Ração > 500kg/semana</h2>
        <p>
            A quantidade de animais com até 1 ano de idade e que consomem mais de 500kg de ração por semana é:
            <strong>{{ $quantidadeJovensRacao}}</strong>
        </p>
    </div>

    <div>
        <h2>Total de Animais Abatidos</h2>
        <p>
            A quantidade de animais abatidos é:
            <strong>{{ $totalAbatidos }}</strong>
        </p>
    </div>
</div>
@endsection
