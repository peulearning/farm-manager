@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Cadastrar Nova Fazenda</h2>
        <a href="{{ route('fazendas.index') }}" class="text-blue-500 hover:text-blue-700">Voltar para a listagem</a>
    </div>

    <form action="{{ route('fazendas.store') }}" method="POST">
        @include('fazendas.partials.form')

        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Salvar
            </button>
        </div>
    </form>
</div>
@endsection
