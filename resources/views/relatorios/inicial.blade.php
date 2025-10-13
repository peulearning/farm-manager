@extends('layouts.app')

@section('content')
    <!-- Seção de Cabeçalho com Imagem -->
    <div class="relative bg-cover bg-center rounded-lg shadow-lg overflow-hidden h-64 mb-8" style="background-image: url('https://agenciacoradenoticias.go.gov.br/wp-content/uploads/2025/06/SEAPA_GOIAS_BATE_RECORDE_NO_ABATE_DE_BOVINOS-1215x810.jpeg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative h-full flex items-center justify-center">
            <h1 class="text-4xl font-bold text-white text-center px-4">Relatórios da Fazenda</h1>
        </div>
    </div>

    <!-- Seção de Relatórios em Cards -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Resumo Semanal</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card: Produção de Leite -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="bg-blue-100 p-3 rounded-full">
                <!-- Ícone de Leite -->
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 12h12l3-12H3zm5 2v2m4-2v2m4-2v2"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Produção de Leite</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalLeiteSemana, 0, ',', '.') }} L</p>
            </div>
        </div>

        <!-- Card: Consumo de Ração -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="bg-green-100 p-3 rounded-full">
                <!-- Ícone de Ração -->
                 <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Consumo de Ração</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($totalRacaoSemana, 0, ',', '.') }} kg</p>
            </div>
        </div>

        <!-- Card: Gado Jovem -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
             <div class="bg-yellow-100 p-3 rounded-full">
                <!-- Ícone de Alerta -->
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Jovens de Alto Consumo</p>
                <p class="text-2xl font-bold text-gray-800">{{ $quantidadeJovensRacao }}</p>
            </div>
        </div>

        <!-- Card: Total de Abatidos -->
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
             <div class="bg-red-100 p-3 rounded-full">
                <!-- Ícone de Abate -->
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total de Animais Abatidos</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalAbatidos }}</p>
            </div>
        </div>
    </div>
@endsection
