@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('DebitosController@index')}}">Débitos</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Débito<small> Novo</small></h2>
</div>

<form method="post" action="{{ action('DebitosController@store') }}">

    <div class="row">

        <div class="col-md-12">

            <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : '' }}">
                <label for="cliente_nome">Pessoa</label>
                    <select class="form-control select2" id="cliente_nome" name="cliente_id" value="{{ Request::old('cliente_id') }}">
                        <option value="">Selecione</option>
                        @foreach ($clientes as $nome => $id)
                            <option value="{{ $id }}">{{ $nome }}</option>
                        @endforeach
                    </select>
                {{ $errors->first('cliente_id', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Descricao</label>
                <input type="text" class="form-control uppercase" id="nome" name="nome" value="{{ Request::old('nome') }}">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('data_debito') ? 'has-error' : '' }}">
                        <label for="data_debito">Data do débito</label>
                        <input type="text" class="form-control data" id="data_debito" name="data_debito" value="{{ Request::old('data_debito') }}">
                        {{ $errors->first('data_debito', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('valor_debito') ? 'has-error' : '' }}">
                        <label for="valor_debito">Valor</label>
                        <input type="valor_debito" class="form-control monetario" id="valor_debito" name="valor_debito" value="{{ Request::old('valor_debito') }}">
                        {{ $errors->first('valor_debito', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('quantidade_parcelas') ? 'has-error' : '' }}">
                        <label for="quantidade_parcelas">Quantidade parcelas</label>
                        <select class="form-control" id="quantidade_parcelas" name="quantidade_parcelas">
                            <option value="">Selecione</option>
                            <option value="1" {{ Request::old('quantidade_parcelas') == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ Request::old('quantidade_parcelas') == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ Request::old('quantidade_parcelas') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ Request::old('quantidade_parcelas') == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ Request::old('quantidade_parcelas') == '5' ? 'selected' : '' }}>5</option>
                            <option value="6" {{ Request::old('quantidade_parcelas') == '6' ? 'selected' : '' }}>6</option>
                            <option value="7" {{ Request::old('quantidade_parcelas') == '7' ? 'selected' : '' }}>7</option>
                            <option value="8" {{ Request::old('quantidade_parcelas') == '8' ? 'selected' : '' }}>8</option>
                            <option value="9" {{ Request::old('quantidade_parcelas') == '9' ? 'selected' : '' }}>9</option>
                            <option value="10" {{ Request::old('quantidade_parcelas') == '10' ? 'selected' : '' }}>10</option>
                            <option value="11" {{ Request::old('quantidade_parcelas') == '11' ? 'selected' : '' }}>11</option>
                            <option value="12" {{ Request::old('quantidade_parcelas') == '12' ? 'selected' : '' }}>12</option>
                        </select>
                        {{ $errors->first('quantidade_parcelas', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <a class="btn btn-link" onclick="history.back()">Voltar</a>
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i> Salvar e gerar parcelas</button>
            </div>
        </div>
    </div>
</form>
@stop