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

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="codigo" class="block text-sm font-medium text-gray-700">Código do Animal</label>
        <input type="text" name="codigo" id="codigo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('codigo', $gado->codigo ?? '') }}" required>
    </div>
    <div>
        <label for="peso" class="block text-sm font-medium text-gray-700">Peso (kg)</label>
        <input type="number" step="0.01" name="peso" id="peso" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('peso', $gado->peso ?? '') }}" required>
    </div>
    <div>
        <label for="leite" class="block text-sm font-medium text-gray-700">Produção de Leite (L/dia)</label>
        <input type="number" step="0.01" name="leite" id="leite" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('leite', $gado->leite ?? '') }}" required>
    </div>
    <div>
        <label for="racao" class="block text-sm font-medium text-gray-700">Consumo de Ração (kg/dia)</label>
        <input type="number" step="0.01" name="racao" id="racao" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('racao', $gado->racao ?? '') }}" required>
    </div>
    <div class="md:col-span-2">
        <label for="fazenda_id" class="block text-sm font-medium text-gray-700">Fazenda</label>
        <select name="fazenda_id" id="fazenda_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
            <option value="">Selecione uma fazenda</option>
            @foreach($fazendas as $fazenda)
                <option value="{{ $fazenda->id }}" @selected(old('fazenda_id', $gado->fazenda_id ?? '') == $fazenda->id)>
                    {{ $fazenda->nome }}
                </option>
            @endforeach
        </select>
    </div>
     <div>
        <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('data_nascimento', isset($gado->data_nascimento) ? $gado->data_nascimento->format('Y-m-d') : '') }}">
    </div>
</div>
