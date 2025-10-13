<?php

namespace App\Http\Controllers;

use App\Models\Fazenda;
use Illuminate\Http\Request;

class FazendaController extends Controller
{
    public function index(){
        $fazendas = Fazenda::withCount('gados')->paginate(10);
        return view('fazendas.index', compact('fazendas'));
    }

    public function create(){
        return view('fazendas.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255|unique:fazendas',
        ]);

        // Adiciona a data/hora atual ao array de dados validados
        $validatedData['created_at'] = now();

        Fazenda::create($validatedData);

        return redirect()->route('fazendas.index')->with('success', 'Fazenda cadastrada com sucesso!');
    }

    public function show(Fazenda $fazenda){
        $fazenda->load('gados'); // Carrega os gados associados
        return view('fazendas.show', compact('fazenda'));
    }

    public function edit(Fazenda $fazenda){
        return view('fazendas.edit', compact('fazenda'));
    }

    public function update(Request $request, Fazenda $fazenda){
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255|unique:fazendas,nome,' . $fazenda->id,
        ]);

        $fazenda->update($validatedData);

        return redirect()->route('fazendas.index')->with('success', 'Fazenda atualizada com sucesso!');
    }

    public function destroy(Fazenda $fazenda){
        // Impede a exclusão se a fazenda tiver gados associados
        if ($fazenda->gados()->count() > 0) {
            return redirect()->route('fazendas.index')->with('error', 'Não é possível excluir a fazenda, pois ela possui gados associados.');
        }

        $fazenda->delete();

        return redirect()->route('fazendas.index')->with('success', 'Fazenda excluída com sucesso!');
    }
}
