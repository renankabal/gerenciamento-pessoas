@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('DependentesController@index')}}">Dependentes</a></li>
  <li class="active">Editar</li>
</ol>

<div class="page-header">
  <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#{{ $dependente->id }}"><i class="glyphicon glyphicon-remove"></i> Excluir</button>
  <h2><i class="glyphicon glyphicon-user"></i> Dependente<small> Editar</small></h2>
</div>

<form method="post" action="{{ action('DependentesController@update', $dependente->id) }}">
    <input type="hidden" name="_method" value="PUT">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : '' }}">
                <label for="_cpf">Pessoa</label>
                <input type="text" class="form-control" id="_data_nascimento" name="_nome" value="{{ $dependente->cliente->nome }}" disabled="disabled">
                <input type="hidden" name="cliente_id" value="{{ $dependente->cliente->id }}">
                {{ $errors->first('cliente_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Tipo de dependente</label>
                <select class="form-control" id="dependente_tipo_id" name="dependente_tipo_id" value="{{ Request::old('dependente_tipo_id') }}">
                    @foreach ($dependenteTipo as $nome => $id)
                    <option value="{{ $id }}" {{ $dependente->dependenteTipo->id == $id ? 'selected' : '' }}>{{ $nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('dependente_tipo_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome do dependente</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $errors->has('nome') ? Request::old('nome') : $dependente->nome }}">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $errors->has('cpf') ? Request::old('cpf') : $dependente->cpf }}">
                {{ $errors->first('cpf', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ Request::old('data_nascimento', date('d/m/Y', strtotime($dependente->data_nascimento))) }}">
                {{ $errors->first('data_nascimento', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('profissao') ? 'has-error' : '' }}">
                <label for="profissao">Profissão</label>
                <input type="profissao" class="form-control" id="profissao" name="profissao" value="{{ $errors->has() ? Request::old('profissao') : $dependente->profissao }}">
                {{ $errors->first('profissao', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('ocupacao') ? 'has-error' : '' }}">
                <label for="ocupacao">Ocupação</label>
                <input type="text" class="form-control" id="ocupacao" name="ocupacao" value="{{ $errors->has() ? Request::old('ocupacao') : $dependente->ocupacao }}">
                {{ $errors->first('ocupacao', '<span class="help-block">:message</span>') }}
            </div>
                
            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $errors->has() ? Request::old('telefone') : $dependente->telefone }}">
                {{ $errors->first('telefone', '<span class="help-block">:message</span>') }}
            </div>
        
            <div class="form-group btn-cadastro">                
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <a class="btn btn-link" onclick="history.back()">Voltar</a>
            </div>

        </div>

    </div><!--row-->
    
</form>

{{-- Modal de confirmação de exclusão --}}

<div class="modal fade" id="{{ $dependente->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Alerta</h4>
            </div>
            <div class="modal-body">
                <h5>Você tem certeza que deseja excluir este dependente? Esta ação não poderá ser desfeita.</h5>
            </div>
            <div class="modal-footer">
                <form class="pull-right" method="post" action="{{ action('DependentesController@destroy', $dependente->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-danger">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop