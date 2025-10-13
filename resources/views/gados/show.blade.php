@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Detalhes do Gado: {{ $gado->codigo }}</h2>
        <a href="{{ route('gados.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a listagem</a>
    </div>

    <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
        <ul class="space-y-3 text-gray-600">
            <li><strong class="font-medium text-gray-800">Peso:</strong> {{ $gado->peso }} kg</li>
            <li><strong class="font-medium text-gray-800">Leite:</strong> {{ $gado->leite }} litros/dia</li>
            <li><strong class="font-medium text-gray-800">Ração:</strong> {{ $gado->racao }} kg/dia</li>
            <li><strong class="font-medium text-gray-800">Data de Nascimento:</strong> {{ $gado->data_nascimento ? $gado->data_nascimento->format('d/m/Y') : 'Não informada' }}</li>
            <li><strong class="font-medium text-gray-800">Fazenda:</strong> {{ $gado->fazenda->nome }}</li>
            <li><strong class="font-medium text-gray-800">Status:</strong>
                @if($gado->data_abate)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Abatido em {{ $gado->data_abate->format('d/m/Y') }}
                    </span>
                @else
                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Vivo
                    </span>
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection
