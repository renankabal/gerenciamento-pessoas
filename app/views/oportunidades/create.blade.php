@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('OportunidadesController@index')}}">Oportunidades</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Oportunidade<small> Novo</small></h2>
</div>

<form method="post" action="{{ action('OportunidadesController@store') }}">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" autofocus name="nome" value="{{ Request::old('nome') }}" onkeyup="up(this)">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>            

            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" autofocus id="telefone" name="telefone" value="{{ Request::old('telefone') }}">
                {{ $errors->first('telefone', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('oportunidade_empresa_id') ? 'has-error' : '' }}">
                <label for="oportunidade_empresa_id">Organização</label>
                <select class="form-control" id="oportunidade_empresa_id" name="oportunidade_empresa_id">
                    <option value="">Selecione</option>
                    @foreach ($oportunidadeEmpresa as $empresa)
                    <option value="{{ $empresa->id }}" @if (Request::old('oportunidade_empresa_id') == $empresa->id) selected @endif>{{ $empresa->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('oportunidade_empresa_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ Request::old('email') }}">
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