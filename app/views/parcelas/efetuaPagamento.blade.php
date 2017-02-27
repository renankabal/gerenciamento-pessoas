@extends('template.layout')
<?php
    $data_atual = date('d/m/Y');
?>
@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  {{-- <li><a href="">Débitos</a></li> --}}
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Débito<small> Novo</small></h2>
</div>

<form method="post" action="{{ action('ParcelasController@storePagamento') }}">
    <input type="hidden" name="debito_id" value="{{ $parcela->debito_id }}">
    <input type="hidden" name="parcela_id" value="{{ $parcela->id }}">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('parcela') ? 'has-error' : '' }}">
                        <label for="parcela">Parcela</label>
                        <input type="parcela" class="form-control" value="{{ $parcela->parcela }}" disabled="disabled">
                        {{ $errors->first('parcela', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        {{  $parcela->status_parcela() }}
                    </div>
                </div>
            </div>
            <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                <label for="descricao">Descricao</label>
                <input type="text" class="form-control uppercase" id="descricao" value="{{ $parcela->descricao }}" disabled="disabled">
                {{ $errors->first('descricao', '<span class="help-block">:message</span>') }}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('valor_parcela') ? 'has-error' : '' }}">
                        <label for="valor_parcela">Valor da parcela</label>
                        <input type="valor_parcela" class="form-control monetario" value="{{ $parcela->valor_parcela }}" disabled="disabled">
                        {{ $errors->first('valor_parcela', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('data_vencimento') ? 'has-error' : '' }}">
                        <label for="data_vencimento">Data de vencimento</label>
                        <input type="text" class="form-control data" value="{{ format_date($parcela->data_vencimento) }}" disabled="disabled">
                        {{ $errors->first('data_vencimento', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('valor_pago') ? 'has-error' : '' }}">
                        <label for="valor_pago">Valor pago</label>
                        <input type="valor_pago" class="form-control monetario" id="valor_pago" name="valor_pago" value="{{ Request::old('valor_pago', $parcela->valor_parcela) }}">
                        {{ $errors->first('valor_pago', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('data_pagamento') ? 'has-error' : '' }}">
                        <label for="data_pagamento">Data de pagamento</label>
                        <input type="text" class="form-control data" id="data_pagamento" name="data_pagamento" value="{{ Request::old('data_pagamento', $data_atual) }}">
                        {{ $errors->first('data_pagamento', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <a class="btn btn-link" onclick="history.back()">Voltar</a>
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i> Efetuar pagamento</button>
            </div>
        </div>
    </div>
</form>
@stop