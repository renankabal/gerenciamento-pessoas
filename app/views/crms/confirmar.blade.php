@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('CrmController@index')}}">Crm</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Crm<small> Novo</small></h2>
</div>

<form method="post" action="{{ action('CrmController@storeCrm') }}">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('oportunidade_id') ? 'has-error' : '' }}">
                <label for="cliente_nome">Oportunidade</label>
                <input type="text" class="form-control" id="oportunidade_id" name="oportunidade_id" value="{{ $oportunidade->nome }}" disabled="disabled">
                <input type="hidden" id="oportunidade_id" name="oportunidade_id" value="{{ $oportunidade->id }}">
                {{ $errors->first('oportunidade_id', '<span class="help-block">:message</span>') }}
            </div>
        
            <div class="form-group {{ $errors->has('crm_tipo_id') ? 'has-error' : '' }}">
                <label>Tipo de CRM</label>
                <select class="form-control" id="crm_tipo_id" name="crm_tipo_id">
                    <option value="">Selecione</option>
                    @foreach ($crms as $crm)
                    <option value="{{ $crm->id }}" @if (Request::old('crm_tipo_id') == $crm->id) selected @endif>{{ $crm->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('crm_tipo_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('conteudo') ? 'has-error' : '' }}">
                <label for="conteudo">Conteudo</label>
                <textarea name="conteudo" class="form-control" cols="20" rows="3">{{ Request::old('conteudo') }}</textarea>
                {{ $errors->first('conteudo', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('data_agendamento') ? 'has-error' : '' }}">
                <label>Data de Agendamento</label>
                <input type="text" class="form-control" id="data_agendamento" name="data_agendamento" value="{{ Request::old('data_agendamento') }}">
                {{ $errors->first('data_agendamento', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('crm_status_id') ? 'has-error' : '' }}">
                <label>Status</label>
                <select class="form-control" id="crm_status_id" name="crm_status_id">
                    <option value="">Selecione</option>
                    @foreach ($crms_status as $crm_status)
                    <option value="{{ $crm_status->id }}" @if (Request::old('crm_status_id') == $crm_status->id) selected @endif>{{ $crm_status->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('crm_status_id', '<span class="help-block">:message</span>') }}
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