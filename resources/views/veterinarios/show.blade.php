@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Detalhes do Veterinário: {{ $veterinario->nome }}</h2>
        <a href="{{ route('veterinarios.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a listagem</a>
    </div>

    <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
        <ul class="space-y-3 text-gray-600">
            <li><strong class="font-medium text-gray-800">Nome:</strong> {{ $veterinario->nome }}</li>
            <li><strong class="font-medium text-gray-800">CRMV:</strong> {{ $veterinario->crmv }}</li>
            
        </ul>
    </div>
</div>
@endsection
