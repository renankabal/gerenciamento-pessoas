@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('UsuarioController@index')}}">Usuarios</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="fa fa-bars"></i> Usuarios<small> <i class="fa fa-angle-right"></i> Novo</small></h2>
</div>

{{ Form::open(array('files' => true, 'url' => 'enviar', 'id' => 'upload_modal_form', 'enctype' => 'multipart/form-data')) }}
    <div class="row">

        <div class="col-md-12">
            {{ Form::label('foto', 'Foto') }}
            {{ Form::file('foto') }}
          <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" autofocus id="nome" name="nome" value="{{ Request::old('nome') }}" placeholder="Digite o nome" onkeyup="up(this)">
                {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">E-Mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ Request::old('email') }}" placeholder="Digite o email">
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group {{ $errors->has('senha') ? 'has-error' : '' }}">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" value="{{ Request::old('senha') }}" placeholder="Digite sua senha" onkeyup="javascript:verifica()">
                {{ $errors->first('senha', '<span class="help-block">:message</span>') }}
                <table id="mostra"></table>
            </div>

            <div class="form-group {{ $errors->has('perfil_id') ? 'has-error' : '' }}">
                <label for="perfil_id">Perfil</label>
                <select class="form-control" id="perfil_id" name="perfil_id" value="{{ Request::old('perfil_id') }}">
                    <option value="">Selecione</option>
                    @foreach($perfis as $perfil)
                    <option value="{{ $perfil->id }}">{{ $perfil->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->first('perfil', '<span class="help-block">:message</span>') }}
            </div>
        </div><!--col-md-6-->

        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <a class="btn btn-default" onclick="history.back()">Voltar</a>
            </div>
        </div>

    </div><!--row-->
    
{{ Form::close() }}

@stop