@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('EventosController@index')}}">Eventos</a></li>
  <li class="active">Editar</li>
</ol>

<div class="page-header">
  <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#{{ $evento->id }}"><i class="glyphicon glyphicon-remove"></i> Excluir</button>
  <h2><i class="fa fa-calendar-check-o"></i> Evento<small> Editar</small></h2>
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

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('data_evento') ? 'has-error' : '' }}">
                        <label for="data_evento">Data do evento</label>
                        <input type="text" class="form-control data " id="data_evento" name="data_evento" value="{{ Request::old('data_evento', date('d/m/Y', strtotime($evento->data_evento))) }}">
                        {{ $errors->first('data_evento', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('hora_evento') ? 'has-error' : '' }}">
                        <label for="hora_evento">Hora do evento</label>
                        <input type="text" class="form-control hora" id="hora_evento" name="hora_evento" value="{{ formata_hora($evento->hora_evento) }}">
                        {{ $errors->first('hora_evento', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
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

            <div class="form-group {{ $errors->has('evento_icone_id') ? 'has-error' : '' }}">
                <label>Selecione o ícone do evento</label>
                <div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
                    @foreach($icones as $icone)
                        @if($icone->id == $evento->evento_icone_id)
                            @define $active = 'active';
                            @define $checked= 'checked';
                        @else
                            @define $active = '';
                            @define $checked= '';
                        @endif
                    <label class="btn btn-default {{ $active }}">
                        <input type="radio" name="evento_icone_id" id="icon-1" value="{{{ $icone->id }}}" checked="{{ $checked }}">
                        <i class="fa {{{ $icone->nome }}} text-muted"></i> </label>
                    @endforeach
                </div>
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

{{-- Modal de confirmação de exclusão --}}
<div class="modal fade" id="{{ $evento->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Alerta</h4>
            </div>
            <div class="modal-body">
                <h5>Você tem certeza que deseja excluir este evento? Esta ação não poderá ser desfeita.</h5>
            </div>
            <div class="modal-footer">
                <form class="pull-right" method="post" action="{{ action('EventosController@destroy', $evento->id) }}">
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