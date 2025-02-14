<?php

namespace App\Http\Controllers;

use App\Models\Acao;
use App\Models\Atividade;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAtividadeRequest;
use App\Http\Requests\UpdateAtividadeRequest;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($acao_id)
    {
        $atividades = Atividade::all()->where('acao_id', $acao_id)->sortBy('id');
        $acao = Acao::find($acao_id);

        return view('atividade.atividade_index', ['atividades' => $atividades, 'acao' => $acao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($acao_id)
    {
        $acao = Acao::findOrFail($acao_id);

        return view('atividade.atividade_create', ['acao' => $acao]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAtividadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Atividade::create($request->all());

        return redirect(Route('acao.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show(Atividade $atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit($atividade_id)
    {
        $atividade = Atividade::findOrFail($atividade_id);

        $acao = Acao::findOrFail($atividade->acao_id);

        return view('atividade.atividade_edit', ['atividade' => $atividade, 'acao' => $acao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtividadeRequest  $request
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $atividade = Atividade::findOrFail($request->id);

        $atividade->status = $request->status;
        $atividade->info = $request->descricao;
        $atividade->data_inicio = $request->data_inicio;
        $atividade->data_fim = $request->data_fim;
        $atividade->acao_id = $request->acao_id;

        $atividade->update();

        return redirect(Route('atividade.index', ['acao_id' => $request->acao_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function delete($atividade_id)
    {
        $atividade = Atividade::findOrFail($atividade_id);
        $atividade->delete();


        return redirect(Route('atividade.index', ['acao_id' => $atividade->acao_id]));
    }
}
