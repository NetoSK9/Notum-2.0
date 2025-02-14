@extends('layouts.app')

@section('title')
    Cadastrar Atividades
@endsection

@section('content')
    <form action="{{Route('atividade.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="acao_id" value="{{ $acao->id }}">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-row">
                    <div class="form-group">
                        <label for="descricao_atividade">Descricao</label>
                        <input name="descricao" type="text" class="form-control" id="descricao_atividade" placeholder="Monitoria, Extensão, etc">
                    </div>

                    <div class="form-group">
                        <label for="inicio_atividade">Início</label>
                        <input name="data_inicio" type="date" class="form-control" id="inicio_atividade" >
                    </div>

                    <div class="form-group">
                        <label for="fim_atividade">Fim</label>
                        <input name="data_fim" type="date" class="form-control" id=fim_atividade" >
                    </div>

                    <div class="form-group">
                        <label for="atividade_acao">Ação</label>
                        <input name="titulo" type="text" class="form-control" id="acao_titulo" value="{{ $acao->titulo }}" disabled>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>

@endsection
