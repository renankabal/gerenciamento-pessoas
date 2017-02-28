@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('DebitosController@index')}}">Debitos</a></li>
  <li class="active">Editar</li>
</ol>

<div class="page-header">
  <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#{{ $debito->id }}"><i class="glyphicon glyphicon-remove"></i> Excluir</button>
  <h2><i class="glyphicon glyphicon-user"></i> Debito<small> Editar</small></h2>
</div>

{{-- <form method="post" action="{{ action('DebitosController@update', $debito->id) }}"> --}}
    {{-- <input type="hidden" name="_method" value="PUT"> --}}

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="cliente_id">Pessoa</label>
                <input type="text" class="form-control" id="cliente_id" name="_nome" value="{{ $debito->cliente->nome }}" disabled="disabled">
            </div>

            <div class="form-group">
                <label for="nome">Descricao</label>
                <input type="text" class="form-control uppercase" id="nome" name="nome" value="{{ $debito->nome }}" disabled="disabled">
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data_debito">Data do débito</label>
                        <input type="text" class="form-control data" id="data_debito" name="data_debito" value="{{ format_date($debito->data_debito) }}" disabled="disabled">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="valor_debito">Valor</label>
                        <input type="valor_debito" class="form-control monetario" name="valor_debito" value="{{ $debito->valor_debito}}" disabled="disabled">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quantidade_parcelas">Quantidade parcelas</label>
                        <input type="quantidade_parcelas" class="form-control monetario" name="quantidade_parcelas" value="{{ $debito->quantidade_parcelas}}" disabled="disabled">
                </div>
        </div>
        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <a class="btn btn-link" onclick="history.back()">Voltar</a>
            </div>
        </div>
    </div>
{{-- </form> --}}

{{-- Modal de confirmação de exclusão --}}
<div class="modal fade" id="{{ $debito->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Alerta</h4>
            </div>
            <div class="modal-body">
                <h5>Você tem certeza que deseja excluir este debito? Esta ação não poderá ser desfeita.</h5>
            </div>
            <div class="modal-footer">
                <form class="pull-right" method="post" action="{{ action('DebitosController@destroy', $debito->id) }}">
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