@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('EventosController@index')}}">Eventos</a></li>
  <li class="active">Editar</li>
</ol>

<div class="page-header">
  <h2><i class="fa fa-bars"></i> Eventos<small> <i class="fa fa-angle-right"></i> Novo</small></h2>
</div>

<form method="post" action="{{ action('EventosController@update', $evento->id) }}">
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome do evento</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ Request::old('nome', $evento->nome) }}">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('data_evento') ? 'has-error' : '' }}">
                <label for="data_evento">Data do evento</label>
                <input type="text" class="form-control data " id="data_evento" name="data_evento" value="{{ Request::old('data_evento', date('d/m/Y', strtotime($evento->data_evento))) }}">
                {{ $errors->first('data_evento', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('anual') ? 'has-error' : '' }}">
                <label for="anual">Evento anual?</label>
                <select class="form-control" id="anual" name="anual" value="{{ Request::old('anual', $evento->anual) }}">
                    @if($evento->anual)
                        @define $ativoSim = 'selected';
                        @define $ativoNão = '';
                    @else
                        @define $ativoSim = '';
                        @define $ativoNão = 'selected';
                    @endif
                    <option value=true {{ $ativoSim }}>Sim</option>
                    <option value=false {{ $ativoNão }}>Não</option>
                </select>
                {{ $errors->first('anual', '<span class="help-block">:message</span>') }}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <a class="btn btn-default" onclick="history.back()">Voltar</a>
            </div>
        </div>

    </div>
    
</form>

@stop