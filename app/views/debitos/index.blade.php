@extends('template.layout')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{action('HomeController@home')}}">Principal</a></li>
        <li><a href="{{action('DebitosController@index')}}">Debitos</a></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <form method="get" action="{{ action('DependentesController@find') }}">
                <div class="input-group">
                  <input type="text" id="busca" name="busca" class="form-control" placeholder="Busca" required>
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                  </span>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a id="botao-novo" href="{{ action('DebitosController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
        </div>
    </div>

    <hr>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>

        <div class="text-center">
        </div>

@stop