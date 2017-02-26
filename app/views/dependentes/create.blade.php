@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('DependentesController@index')}}">Dependentes</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Dependente<small> Novo</small></h2>
</div>

<form method="post" action="{{ isset($clienteController) ? action('ClientesController@storeDependente') : action('DependentesController@store') }}">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : '' }}">
                <label for="cliente_nome">Cliente</label>

                @if (isset($clienteController))
                    <input type="text" class="form-control" id="_nome" name="_nome" value="{{ $cliente->nome }}" disabled="disabled">
                    <input type="hidden" id="cliente_id" name="cliente_id" value="{{ $cliente->id }}">
                @else
                    <select class="form-control" id="cliente_nome" name="cliente_id" value="{{ Request::old('cliente_id') }}">
                        <option value="">Selecione</option>
                    @foreach ($clientes as $nome => $id)
                        <option value="{{ $id }}">{{ $nome }}</option>
                    @endforeach
                    </select>
                @endif

                {{ $errors->first('cliente_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('dependente_tipo_id') ? 'has-error' : '' }}">
                <label for="dependente_tipo_id">Tipo de dependente</label>
                <select class="form-control" id="dependente_tipo_id" name="dependente_tipo_id">
                    <option value="">Selecione</option>
                    @foreach ($tipoDependente as $tipo)
                    <option value="{{ $tipo->id }}" {{ Request::old('dependente_tipo_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('dependente_tipo_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ Request::old('nome') }}">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ Request::old('cpf') }}">
                {{ $errors->first('cpf', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ Request::old('data_nascimento') }}">
                {{ $errors->first('data_nascimento', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('profissao') ? 'has-error' : '' }}">
                <label for="profissao">Profissão</label>
                <input type="profissao" class="form-control" id="profissao" name="profissao" value="{{ Request::old('profissao') }}">
                {{ $errors->first('profissao', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('ocupacao') ? 'has-error' : '' }}">
                <label for="ocupacao">Ocupação</label>
                <input type="text" class="form-control" id="ocupacao" name="ocupacao" value="{{ Request::old('ocupacao') }}">
                {{ $errors->first('ocupacao', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ Request::old('telefone') }}">
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

@stop