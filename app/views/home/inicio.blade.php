@extends('template.layout')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-head-line">Inicio</h3>
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        {{-- Botoes da primeira linha --}}
        <div class="row">
            <div class="col-md-6">
                <a href="{{action('OportunidadesController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/comment.png" width="50%">
                        <h5>Oportunidade</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{action('CrmController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/calendar_empty.png" width="50%">
                        <h5>CRM</h5>
                    </div>
                </a>
            </div>
        </div>
        {{-- Botoes da segunda linha --}}
        <div class="row">
            <div class="col-md-6">
                <a href="{{action('HomologacaoController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/search_page.png" width="50%">
                        <h5>Homologar</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{action('ClientesController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/user.png" width="50%">
                        <h5>Cliente</h5>
                    </div>
                </a>
            </div>
        </div>
        {{-- Botoes da terceira linha --}}
        <div class="row">
            <div class="col-md-6">
                <a href="{{action('CobrancaController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/folder_full.png" width="50%">
                        <h5>Cobrança</h5>
                    </div>
                </a>                
            </div>
            <div class="col-md-6">
                <a href="{{action('AtendimentosController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/clock.png" width="50%">
                        <h5>Atendimentos</h5>
                    </div>
                </a>
            </div>
        </div>
        {{-- Botoes da quarta linha --}}
        <div class="row">
            <div class="col-md-6">
                <a href="{{action('UsuarioController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/lock.png" width="50%">
                        <h5>Usuário</h5>
                    </div>
                </a>
            </div>            
            <div class="col-md-6">
                <a href="{{ url('sair') }}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/delete.png" width="50%">
                        <h5>Sair</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        {{-- Grafico que exibe as oportunidades por operador --}}
        <div id="container" style="height: 290px; margin: 0 auto"></div>
        <table id="datatable" style="display:none;">
            <thead>
                <tr>
                    <th></th>
                    <th>Renan Jhonatha</th>
                    <th>Rodrigo Calilo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th></th>
                    <td>8</td>
                    <td>5</td>
                </tr>
                </tr>
            </tbody>
        </table>
        {{-- Exibe as oportunidades por operador--}}
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i>Oportunidade por operador
            </div>

            <div class="panel-body">
                <div class="list-group">
                @foreach($oportunidades_totais as $oportunidade_total)
                    <?php
                        #Pega Nome e Sobrenome
                        $nome = explode(' ', trim($oportunidade_total->nome));
                        $cont = count($nome)-1;
                    ?>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-bullhorn"></i> {{{ $nome[0]." ".$nome[$cont] }}}
                    <span class="pull-right text-muted small"><em>{{{ $oportunidade_total->total }}}</em>
                    </span>
                    </a>
                @endforeach
                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-info btn-block">Ver detalhes</a>
            </div>

        </div>
    </div>

</div>
@stop