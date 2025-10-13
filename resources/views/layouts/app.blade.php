<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.ico">
    <title>Gerenciador de Fazenda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- AlpineJS para interatividade do menu mobile --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col">

        <div x-data="{ open: false }">
            <!-- Barra de Navegação -->
            <nav class="bg-white shadow-lg">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center py-4">
                        <!-- Logo -->
                        <a href="{{ url('/relatorios/inicial') }}" class="text-2xl font-bold text-gray-800">
                            🐄 Gerenciador de Fazenda
                        </a>

                        <!-- Links para Desktop -->
                        <div class="hidden md:flex items-center space-x-4">
                            <a href="{{ url('/relatorios/inicial') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Página Inicial</a>
                            <a href="{{ route('gados.index') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Gados</a>
                            <a href="{{ route('fazendas.index') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Fazendas</a>
                            <a href="{{ route('veterinarios.index') }}" class="text-gray-600 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Veterinários</a>
                            <a href="{{ route('relatorios.abatidos') }}" class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-2 rounded-md text-sm font-medium">Relatório de Abatidos</a>
                        </div>

                        <!-- Botão do Menu Mobile -->
                        <div class="md:hidden flex items-center">
                            <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                <span class="sr-only">Abrir menu principal</span>
                                <!-- Ícone Hamburguer -->
                                <svg x-show="!open" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                <!-- Ícone 'X' de Fechar -->
                                <svg x-show="open" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Menu Mobile (visível quando 'open' é true) -->
                <div x-show="open" class="md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                        <a href="{{ url('/relatorios/inicial') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md text-base font-medium">Página Inicial</a>
                        <a href="{{ route('gados.index') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md text-base font-medium">Gados</a>
                        <a href="{{ route('fazendas.index') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md text-base font-medium">Fazendas</a>
                        <a href="{{ route('veterinarios.index') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md text-base font-medium">Veterinários</a>
                        <a href="{{ route('relatorios.abatidos') }}" class="text-gray-700 hover:bg-gray-200 block px-3 py-2 rounded-md text-base font-medium">Relatório de Abatidos</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Conteúdo Principal -->
        <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- ÁREA DAS FLASH MESSAGES --}}
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p class="font-bold">Sucesso!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <p class="font-bold">Erro!</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                @yield('content')
            </div>
        </main>

        <!-- Rodapé -->
        <footer class="text-center text-sm text-gray-500 py-4 mt-8">
            &copy; {{ date('Y') }} Gerenciador de Fazendas. Todos os direitos reservados - Pedro Henrique ♥️
        </footer>
    </div>
</body>
</html>
