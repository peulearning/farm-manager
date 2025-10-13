@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Listagem de Veterinários</h2>
        <a href="{{ route('veterinarios.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition ease-in-out duration-150">
            Adicionar Novo Veterinário
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">CRMV</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($veterinarios as $veterinario)
                    <tr>
                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $veterinario->nome }}</td>
                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $veterinario->crmv }}</td>
                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm text-center">
                            <div class="flex item-center justify-center space-x-2">
                                <a href="{{ route('veterinarios.show', $veterinario->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                <a href="{{ route('veterinarios.edit', $veterinario->id) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                                <form action="{{ route('veterinarios.destroy', $veterinario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este veterinário?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 px-5 text-gray-500">Nenhum veterinário encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $veterinarios->links() }}
</div>
@endsection
