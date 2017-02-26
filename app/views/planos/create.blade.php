@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('PlanoController@index')}}">Plano</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="fa fa-bars"></i> Planos<small> <i class="fa fa-angle-right"></i> Novo</small></h2>
</div>

<form method="post" action="{{ action('PlanoController@store') }}">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" autofocus id="nome" name="nome" value="{{ Request::old('nome') }}" placeholder="Digite o nome do perfil">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" autofocus id="nome" name="descricao" value="{{ Request::old('descricao') }}" placeholder="Digite a descrição do plano">
                {{ $errors->first('descricao', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                <label for="valor">Valor</label>
                <input type="text" onkeyup="return(formata_monetario(this))" class="form-control" autofocus id="nome" name="valor" value="{{ Request::old('valor') }}" placeholder="Digite o valor do plano">
                {{ $errors->first('valor', '<span class="help-block">:message</span>') }}
            </div>

        </div><!--col-md-12-->

        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <a class="btn btn-default" onclick="history.back()">Voltar</a>
            </div>
        </div>

    </div><!--row-->
    
</form>

@stop