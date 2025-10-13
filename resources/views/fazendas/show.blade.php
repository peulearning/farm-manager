@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Detalhes da Fazenda: {{ $fazenda->nome }}</h2>
        <a href="{{ route('fazendas.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a listagem</a>
    </div>

    <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Gados nesta Fazenda ({{ $fazenda->gados->count() }})</h3>
        @if($fazenda->gados->count() > 0)
            <ul class="space-y-2 text-gray-600 list-disc list-inside">
                @foreach($fazenda->gados as $gado)
                    <li>Código: <a href="{{ route('gados.show', $gado->id) }}" class="text-blue-500 hover:underline">{{ $gado->codigo }}</a> - Peso: {{ $gado->peso }} kg</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Nenhum gado cadastrado para esta fazenda.</p>
        @endif
    </div>
</div>
@endsection
