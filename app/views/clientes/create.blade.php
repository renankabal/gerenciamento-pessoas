@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('ClientesController@index')}}">Clientes</a></li>
  <li class="active">Novo</li>
</ol>

<div class="page-header">
  <h2><i class="glyphicon glyphicon-user"></i> Cliente<small> Novo</small></h2>
</div>

<form method="post" action="{{ action('ClientesController@store') }}">

    <div class="row">
        <div class="col-md-12">
            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#dados-pessoais" data-toggle="tab">Dados pessoais</a></li>
                    <li><a href="#endereco" data-toggle="tab">Endereço</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="dados-pessoais">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group {{ $errors->has('oportunidade_id') ? 'has-error' : '' }}">
                                        <label for="oportunidade_id">Nome</label>
                                        <input type="text" class="form-control uppercase" id="nome" name="cliente[nome]" value="{{ Request::old('nome') }}">
                                        {{ $errors->first('oportunidade_id', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('associado') ? 'has-error' : '' }}">
                                        <label for="associado">Data de Associado</label>
                                        <input type="text" class="form-control data" id="associado" name="cliente[associado]" value="{{ Request::old('associado') }}">
                                        {{ $errors->first('associado', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control cpf" id="cpf" name="cliente[cpf]" value="{{ Request::old('cpf') }}">
                                        {{ $errors->first('cpf', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                                        <label for="data_nascimento">Data de nascimento</label>
                                        <input type="text" class="form-control" id="data_nascimento" name="cliente[data_nascimento]" value="{{ Request::old('data_nascimento') }}">
                                        {{ $errors->first('data_nascimento', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('rg') ? 'has-error' : '' }}">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control" id="rg" name="cliente[rg]" value="{{ Request::old('rg') }}">
                                        {{ $errors->first('rg', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('orgao_expedidor') ? 'has-error' : '' }}">
                                        <label for="orgao_expedidor">Órgão expedidor</label>
                                        <input type="text" class="form-control uppercase" id="orgao_expedidor" name="cliente[orgao_expedidor]" value="{{ Request::old('orgao_expedidor') }}">
                                        {{ $errors->first('orgao_expedidor', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('data_emissao') ? 'has-error' : '' }}">
                                        <label for="data_emissao">Data de emissão</label>
                                        <input type="text" class="form-control" id="data_emissao" name="cliente[data_emissao]" value="{{ Request::old('data_emissao') }}">
                                        {{ $errors->first('data_emissao', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('sexo') ? 'has-error' : '' }}">
                                        <label for="sexo">Sexo</label>
                                        <select class="form-control" id="sexo" name="cliente[sexo]">
                                            <option value="">Selecione</option>
                                            <option value="M" {{ Request::old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                            <option value="F" {{ Request::old('sexo') == 'F' ? 'selected' : '' }}>Feminino</option>
                                        </select>
                                        {{ $errors->first('sexo', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                            </div>                            

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control lowercase" id="email" name="cliente[email]" value="{{ Request::old('email') }}">
                                        {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('profissao') ? 'has-error' : '' }}">
                                        <label for="profissao">Profissão</label>
                                        <input type="profissao" class="form-control uppercase" id="profissao" name="cliente[profissao]" value="{{ Request::old('profissao') }}">
                                        {{ $errors->first('profissao', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : '' }}">
                                        <label for="estado_civil">Estado civil</label>
                                        <select class="form-control" id="estado_civil" name="cliente[estado_civil]" value="{{ Request::old('estado_civil') }}">
                                            <option value="">Selecione</option>
                                            <option value="Solteiro" {{ Request::old('estado_civil') == 'Solteiro' ? 'selected' : '' }}>Solteiro</option>
                                            <option value="Casado" {{ Request::old('estado_civil') == 'Casado' ? 'selected' : '' }}>Casado</option>
                                            <option value="Separado" {{ Request::old('estado_civil') == 'Separado' ? 'selected' : '' }}>Separado</option>
                                            <option value="Divorciado" {{ Request::old('estado_civil') == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                            <option value="Viúvo" {{ Request::old('estado_civil') == 'Viúvo' ? 'selected' : '' }}>Viúvo</option>
                                        </select>
                                        {{ $errors->first('estado_civil', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group {{ $errors->has('contato') ? 'has-error' : '' }}">
                                        <label for="contato">Contato</label>
                                        <input type="text" class="form-control" id="contato" name="telefone[contato]" value="{{ Request::old('contato') }}">
                                        {{ $errors->first('contato', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('telefone_tipo_id') ? 'has-error' : '' }}">
                                        <label for="telefone_tipo_id">Tipo</label>
                                        <select class="form-control" id="telefone_tipo_id" name="telefone[telefone_tipo_id]" value="{{ Request::old('telefone_tipo') }}">
                                            <option value="">Selecione</option>
                                            @foreach($telefoneTipo as $tipo)
                                            <option value="{{ $tipo->id }}" {{ Request::old('telefone_tipo_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nome }}</option>
                                            @endforeach
                                        </select>
                                        {{ $errors->first('telefone_tipo_id', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('ativo') ? 'has-error' : '' }}">
                                <label for="ativo">Associado ativo?</label>
                                <select class="form-control" id="ativo" name="cliente[ativo]" value="{{ Request::old('ativo') }}">
                                    <option value=true>Sim</option>
                                    <option value=false>Não</option>
                                </select>
                                {{ $errors->first('ativo', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="endereco">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="endereco[cep]" value="{{ Request::old('cep') }}">
                                        <span id="msg-cep" class="help-block">CEP não encontrado.</span>
                                        {{ $errors->first('cep', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img id="gif-loading" src="{{ asset('/template/assets/img/loading.gif') }}">
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('logradouro') ? 'has-error' : '' }}">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control uppercase" id="logradouro" name="endereco[logradouro]" value="{{ Request::old('logradouro') }}">
                                {{ $errors->first('logradouro', '<span class="help-block">:message</span>') }}
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control uppercase" id="numero" name="endereco[numero]" value="{{ Request::old('numero') }}">
                                        {{ $errors->first('numero', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group {{ $errors->has('referencia') ? 'has-error' : '' }}">
                                        <label for="referencia">Referência</label>
                                        <input type="text" class="form-control uppercase" id="referencia" name="endereco[referencia]" value="{{ Request::old('referencia') }}">
                                        {{ $errors->first('referencia', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('bairro') ? 'has-error' : '' }}">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control uppercase" id="bairro" name="endereco[bairro]" value="{{ Request::old('bairro') }}">
                                {{ $errors->first('bairro', '<span class="help-block">:message</span>') }}
                            </div>

                            <div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control uppercase" id="cidade" name="endereco[cidade]" value="{{ Request::old('cidade') }}">
                                {{ $errors->first('cidade', '<span class="help-block">:message</span>') }}
                            </div>

                            <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control uppercase" id="estado" name="endereco[estado]" value="{{ Request::old('estado') }}">
                                {{ $errors->first('estado', '<span class="help-block">:message</span>') }}
                            </div>

                        </div><!--col-md-12-->
                    </div>
                </div>
            </div>        
        </div>
        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <a class="btn btn-link" onclick="history.back()">Voltar</a>
            </div>
        </div>

    </div><!--row-->
    
</form>

@stop