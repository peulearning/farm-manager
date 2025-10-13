<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gado;
use App\Models\Fazenda; // Importar o model Fazenda para o formulário de criação/edição

class GadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // CORREÇÃO: Usar `with('fazenda')` para carregar o relacionamento e evitar o problema N+1.
        // ADIÇÃO: Usar `paginate()` para não sobrecarregar o sistema com muitos registros de uma vez.
        $gados = Gado::with('fazenda')->latest()->paginate(15);

        return view('gados.index', compact('gados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ADIÇÃO: Enviar a lista de fazendas para o formulário de criação
        $fazendas = Fazenda::all();
        return view('gados.create', compact('fazendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ADIÇÃO: Validar os dados recebidos do formulário
        $request->validate([
            'codigo' => 'required|string|unique:gados,codigo',
            'leite' => 'required|numeric|min:0',
            'racao' => 'required|numeric|min:0',
            'peso' => 'required|numeric|min:0',
            'fazenda_id' => 'required|exists:fazendas,id',
        ]);

        Gado::create($request->all());

        return redirect()->route('gados.index')
            ->with('success', 'Gado cadastrado com sucesso.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // O método with('fazenda') aqui é uma boa prática para garantir que o relacionamento seja carregado.
        $gado = Gado::with('fazenda')->findOrFail($id);
        return view('gados.show', compact('gado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gado  $gado
     * @return \Illuminate\Http\Response
     */
    public function edit(Gado $gado)
    {
        // ADIÇÃO: Enviar a lista de fazendas para o formulário de edição
        $fazendas = Fazenda::all();
        return view('gados.edit', compact('gado', 'fazendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gado  $gado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gado $gado)
    {
        // ADIÇÃO: Validar os dados recebidos, ignorando o código do gado atual na verificação de 'unique'
        $request->validate([
            'codigo' => 'required|numeric|unique:gados,codigo,' . $gado->id,
            'leite' => 'required|numeric|min:0',
            'racao' => 'required|numeric|min:0',
            'peso' => 'required|numeric|min:0',
            'fazenda_id' => 'required|exists:fazendas,id',
        ]);

        $gado->update($request->all());

        return redirect()->route('gados.index')
            ->with('success', 'Gado atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gado  $gado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gado $gado)
    {
        $gado->delete();

        return redirect()->route('gados.index')
            ->with('success', 'Gado excluído com sucesso.');
    }


    public function abater($id)
    {
        try {
            $gado = Gado::findOrFail($id);

            // Verifica se o gado pode ser abatido
            if (!$gado->podeSerAbatido()) {
                return response()->json([
                    'error' => 'O animal não se enquadra nas condições de abate.'
                ], 400);
            }

            // Abate o gado
            $gado->abater();

            return response()->json([
                'message' => '✅ Animal abatido com sucesso!',
                'animal' => $gado
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }


    public function relatorioAbatidos()
    {
        $animaisAbatidos = Gado::whereNotNull('data_abate')->get();

        return view('relatorios.abatidos', compact('animaisAbatidos'));
    }
}
