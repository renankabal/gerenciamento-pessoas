@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('HomologacaoController@index')}}">Homologação</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Homologação<small> Novo</small></h2>
</div>

<form method="post" action="{{ action('HomologacaoController@store') }}">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" autofocus name="nome" value="{{ Request::old('nome') }}" onkeyup="up(this)">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" autofocus id="email" name="email" value="{{ Request::old('email') }}">
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" autofocus id="telefone" name="telefone" value="{{ Request::old('telefone') }}">
                {{ $errors->first('telefone', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="oportunidade_empresa_id">Organização</label>
                <select class="form-control" id="oportunidade_empresa_id" name="oportunidade_empresa_id" value="{{ Request::old('oportunidade_empresa_id') }}">
                    <option value="">Selecione</option>
                    @foreach ($oportunidadeEmpresa as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('oportunidade_empresa_id', '<span class="help-block">:message</span>') }}
            </div>
            
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="oportunidade_status_id">Status</label>
                <select class="form-control" id="oportunidade_status_id" name="oportunidade_status_id" value="{{ Request::old('oportunidade_status_id') }}">
                    <option value="">Selecione</option>
                    @foreach ($oportunidadeStatus as $status)
                    <option value="{{ $status->id }}">{{ $status->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('oportunidade_status_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                <label for="descricao">Descriçao</label>
                <textarea class="form-control" rows="3" name="descricao">{{ Request::old('descricao') }}</textarea>
                {{ $errors->first('descricao', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-warning"><i class="fa fa-user-plus"></i> Homologar e cadastrar</button>
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <button onclick="history.back()" class="btn btn-default"><i class="fa fa-reply"></i> Voltar</button>
            </div>

        </div>

    </div><!--row-->
    
</form>

@stop