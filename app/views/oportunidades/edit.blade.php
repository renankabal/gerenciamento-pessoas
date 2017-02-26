@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('OportunidadesController@index')}}">Oportunidades</a></li>
  <li class="active">Editar</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Oportunidade<small> Editar</small></h2>
</div>

<form method="post" action="{{ action('OportunidadesController@update', $oportunidade->id) }}">
    <input type="hidden" name="_method" value="PUT">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" autofocus name="nome" value="{{ Request::old('nome', $oportunidade->nome) }}" onkeyup="up(this)">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" autofocus id="telefone" name="telefone" value="{{ Request::old('telefone', $oportunidade->telefone) }}">
                {{ $errors->first('telefone', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="status">Organização</label>
                <select class="form-control" id="oportunidade_empresa_id" name="oportunidade_empresa_id">
                    <option value="">Selecione</option>
                    @foreach ($oportunidadeEmpresa as $empresas)
                    <option value="{{ $empresas->id }}" @if ($oportunidade->oportunidade_empresa_id == $empresas->id) selected @endif>{{ $empresas->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('oportunidade_empresa_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" autofocus id="email" name="email" value="{{ Request::old('email', $oportunidade->email) }}">
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
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