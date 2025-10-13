<?php

namespace App\Http\Controllers;

use App\Models\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    public function index()
    {
        // A linha abaixo é a correção. Usamos paginate() em vez de all() ou get().
        $veterinarios = Veterinario::paginate(10);
        return view('veterinarios.index', compact('veterinarios'));
    }

    public function create()
    {
        return view('veterinarios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'crmv' => 'required|string|max:20|unique:veterinarios',
        ]);

        Veterinario::create($validatedData);

        return redirect()->route('veterinarios.index')->with('success', 'Veterinário cadastrado com sucesso!');
    }

    public function show(Veterinario $veterinario)
    {
        return view('veterinarios.show', compact('veterinario'));
    }

    public function edit(Veterinario $veterinario)
    {
        return view('veterinarios.edit', compact('veterinario'));
    }

    public function update(Request $request, Veterinario $veterinario)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'crmv' => 'required|string|max:20|unique:veterinarios,crmv,' . $veterinario->id,
        ]);

        $veterinario->update($validatedData);

        return redirect()->route('veterinarios.index')->with('success', 'Veterinário atualizado com sucesso!');
    }

    public function destroy(Veterinario $veterinario)
    {
        // Adicionar lógica de verificação aqui se o veterinário estiver ligado a outros registros no futuro.
        $veterinario->delete();
        return redirect()->route('veterinarios.index')->with('success', 'Veterinário excluído com sucesso!');
    }
}
