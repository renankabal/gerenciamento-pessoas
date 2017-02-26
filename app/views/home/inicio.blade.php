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
                <a href="{{action('ClientesController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/user.png" width="50%">
                        <h5>Pessoa</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{action('DebitosController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/folder_full.png" width="50%">
                        <h5>Cobrança</h5>
                    </div>
                </a>                
            </div>
        </div>
        {{-- Botoes da segunda linha --}}
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
            <tr>
                <th></th>
                <th>Feminino</th>
                <th>Masculino</th>
            </tr>
            <tr>
                <th></th>
                @foreach($pessoas_sexo as $sexo)
                    <td>{{ $sexo->total }}</td>
                @endforeach
            </tr>
        </table>
        {{-- Exibe as oportunidades por operador--}}
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i>Oportunidade por operador
            </div>

            <div class="panel-body">
                <div class="list-group">

                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-info btn-block">Ver detalhes</a>
            </div>

        </div>
    </div>

</div>
@stop