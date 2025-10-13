<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Fazenda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen container mx-auto px-4 sm:px-6 lg:px-8">
        <header class="py-6">
            <h1 class="text-3xl font-bold text-gray-800">Gerenciador de Fazenda</h1>
        </header>

        <main class="bg-white shadow-md rounded-lg p-6">
            @yield('content')
        </main>

        <footer class="text-center text-sm text-gray-500 py-4 mt-8">
            &copy; {{ date('Y') }} Gerenciador de Fazendas . Todos os direitos reservados.
        </footer>
    </div>
</body>
</html>
