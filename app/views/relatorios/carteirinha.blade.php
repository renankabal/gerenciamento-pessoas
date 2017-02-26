@extends('template.relatorios.relatorio')

@section('title') Carteira de estudante @stop

{{-- {{ dd($clientes) }} --}}
@section('layout-conteudo')
        {{ $clientes->nome }}
@stop