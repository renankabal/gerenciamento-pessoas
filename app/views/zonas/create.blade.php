@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('ZonasController@index')}}">Zona</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="fa fa-bars"></i> Zonas<small> <i class="fa fa-angle-right"></i> Novo</small></h2>
</div>

<form method="post" action="{{ action('ZonasController@store') }}">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" autofocus id="nome" name="nome" value="{{ Request::old('nome') }}" placeholder="Digite o nome do perfil">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('identificacao') ? 'has-error' : '' }}">
                <label for="identificacao">Identificação</label>
                <input type="number" class="form-control" autofocus id="identificacao" name="identificacao" value="{{ Request::old('identificacao') }}" placeholder="Digite a identificacao">
                {{ $errors->first('identificacao', '<span class="help-block">:message</span>') }}
            </div>

        </div><!--col-md-6-->

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