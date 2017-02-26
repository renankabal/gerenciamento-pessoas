@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('HomologacaoController@index')}}">Homologação</a></li>
  <li class="active">Editar</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Homologação<small> Editar</small></h2>
</div>

<form method="post" action="{{ action('HomologacaoController@update', $oportunidade->id) }}">
    <input type="hidden" name="_method" value="PUT">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" autofocus name="nome" value="{{ Request::old('nome', $oportunidade->nome) }}" onkeyup="up(this)">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" autofocus id="email" name="email" value="{{ Request::old('email', $oportunidade->email) }}">
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" autofocus id="telefone" name="telefone" value="{{ Request::old('telefone', $oportunidade->telefone) }}">
                {{ $errors->first('telefone', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="status">Organização</label>
                <select class="form-control" id="oportunidade_empresa_id" name="oportunidade_empresa_id">
                    @foreach ($oportunidadeEmpresa as $empresas)
                    <option value="{{ $empresas->id }}" @if ($oportunidade->oportunidade_empresa_id == $empresas->id) selected @endif>{{ $empresas->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('oportunidade_empresa_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="status">Status</label>
                <select class="form-control" id="oportunidade_status_id" name="oportunidade_status_id">
                    @foreach ($oportunidadeStatus as $status)
                    <option value="{{ $status->id }}" @if ($oportunidade->oportunidade_status_id == $status->id) selected @endif>{{ $status->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('oportunidade_status_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Se o status for <strong>finalizado</strong>, você será redirecionado para a tela de cadastro do cliente.
            </div>

            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <button onclick="history.back()" class="btn btn-link">Voltar</button>
            </div>

        </div>

    </div><!--row-->
    
</form>

@stop