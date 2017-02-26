@extends('template.relatorios.relatorio')

@section('title') Carteira de estudante @stop

{{-- {{ dd($clientes) }} --}}
@section('layout-conteudo')
        @include('relatorios.corpo_carteira')
@stop