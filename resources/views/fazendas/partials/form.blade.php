@csrf

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Atenção!</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Fazenda</label>
    <input type="text" name="nome" id="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('nome', $fazenda->nome ?? '') }}" required>
</div>
   <div>
        <label for="tamanho" class="block text-sm font-medium text-gray-700">Tamanho</label>
        <input type="number" name="tamanho" id="tamanho" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('tamanho', $fazenda->tamanho ?? '') }}">
    </div>

    <div>
        <label for="responsavel_id" class="block text-sm font-medium text-gray-700">Responsável</label>
        <input type="text" name="responsavel" id="responsavel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('responsavel', $fazenda->responsavel ?? '') }}" required>
    </div>

