@extends('template.layout')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{action('HomeController@home')}}">Principal</a></li>
  <li><a href="{{action('ClientesController@index')}}">Pessoas</a></li>
  <li class="active">Editar</li>
</ol>

<div class="page-header">
    <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#{{ $cliente->id }}"><i class="glyphicon glyphicon-remove"></i> Excluir</button>
    <h2><i class="glyphicon glyphicon-user"></i> Cliente<small> Editar</small></h2>
</div>

<form method="post" action="{{ action('ClientesController@update', $cliente->id) }}">
    <input type="hidden" name="_method" value="PUT">
    <div class="row">

        <div class="col-md-12">
            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#dados-pessoais" data-toggle="tab">Dados pessoais</a></li>
                    <li><a href="#endereco" data-toggle="tab">Endereço</a></li>
                    <li><a href="#dependentes" data-toggle="tab">Dependentes</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="dados-pessoais">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control uppercase" id="nome" name="cliente[nome]" value="{{ Request::old('nome', $cliente->nome) }}">
                                    {{ $errors->first('nome', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('associado') ? 'has-error' : '' }}">
                                    <label for="associado">Data de Associado</label>
                                    <input type="text" class="form-control data " id="associado" name="cliente[associado]" value="{{ Request::old('associado', date('d/m/Y', strtotime($cliente->associado))) }}">
                                    {{ $errors->first('associado', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cliente[cpf]" value="{{ Request::old('cpf', $cliente->cpf) }}">
                            {{ $errors->first('cpf', '<span class="help-block">:message</span>') }}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('rg') ? 'has-error' : '' }}">
                                    <label for="rg">RG</label>
                                    <input type="text" class="form-control" id="rg" name="cliente[rg]" value="{{ Request::old('rg', $cliente->rg) }}">
                                    {{ $errors->first('rg', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('orgao_expedidor') ? 'has-error' : '' }}">
                                    <label for="orgao_expedidor">Expedidor</label>
                                    <input type="text" class="form-control uppercase" id="orgao_expedidor" name="cliente[orgao_expedidor]" value="{{ Request::old('orgao_expedidor', $cliente->orgao_expedidor) }}">
                                    {{ $errors->first('orgao_expedidor', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('data_emissao') ? 'has-error' : '' }}">
                                    <label for="data_emissao">Emissão</label>
                                    <input type="text" class="form-control" id="data_emissao" name="cliente[data_emissao]" value="{{ Request::old('data_emissao', date('d/m/Y', strtotime($cliente->data_emissao))) }}">
                                    {{ $errors->first('data_emissao', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input type="text" class="form-control" id="data_nascimento" name="cliente[data_nascimento]" value="{{ Request::old('data_nascimento', date('d/m/Y', strtotime($cliente->data_nascimento))) }}">
                            {{ $errors->first('data_nascimento', '<span class="help-block">:message</span>') }}
                        </div>

                        <div class="form-group {{ $errors->has('sexo') ? 'has-error' : '' }}">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" id="sexo" name="cliente[sexo]" value="{{ Request::old('sexo', $cliente->sexo) }}">
                                <option value="M" {{ $cliente->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ $cliente->sexo == 'F' ? 'selected' : '' }}>Feminino</option>
                            </select>
                            {{ $errors->first('sexo', '<span class="help-block">:message</span>') }}
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control lowercase" id="email" name="cliente[email]" value="{{ Request::old('email', $cliente->email) }}">
                            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                        </div>

                        <div class="form-group {{ $errors->has('profissao') ? 'has-error' : '' }}">
                            <label for="profissao">Profissão</label>
                            <input type="profissao" class="form-control uppercase" id="profissao" name="cliente[profissao]" value="{{ Request::old('profissao', $cliente->profissao) }}">
                            {{ $errors->first('profissao', '<span class="help-block">:message</span>') }}
                        </div>

                        {{-- contato --}}

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group {{ $errors->has('contato') ? 'has-error' : '' }}">
                                    <label for="contato">Contato</label>
                                    <input type="text" class="form-control" id="contato" name="telefone[contato]" value="{{ Request::old('contato', $cliente->telefone->contato) }}">
                                    {{ $errors->first('contato', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('telefone_tipo_id') ? 'has-error' : '' }}">
                                    <label for="telefone_tipo_id">Tipo</label>
                                    <select class="form-control" id="telefone_tipo_id" name="telefone[telefone_tipo_id]" value="{{ Request::old('telefone_tipo_id', $cliente->telefone_tipo_id) }}">
                                        @foreach($telefoneTipo as $tipo)
                                        <option value="{{ $tipo->id }}" {{ $cliente->telefone->telefone_tipo_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nome }}</option>
                                        @endforeach
                                    </select>
                                    {{ $errors->first('telefone_tipo_id', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>
                        </div>
                    </div><!--tab-dados-pessoais-->

                    <div class="tab-pane" id="endereco">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control" id="cep" name="endereco[cep]" value="{{ Request::old('cep', $cliente->enderecoCorrespondencia->cep) }}">
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
                                    <input type="text" class="form-control uppercase" id="logradouro" name="endereco[logradouro]" value="{{ Request::old('logradouro', $cliente->enderecoCorrespondencia->logradouro) }}">
                                    {{ $errors->first('logradouro', '<span class="help-block">:message</span>') }}
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                                            <label for="numero">Número</label>
                                            <input type="text" class="form-control uppercase" id="numero" name="endereco[numero]" value="{{ Request::old('numero', $cliente->enderecoCorrespondencia->numero) }}">
                                            {{ $errors->first('numero', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group {{ $errors->has('referencia') ? 'has-error' : '' }}">
                                            <label for="referencia">Referência</label>
                                            <input type="text" class="form-control uppercase" id="referencia" name="endereco[referencia]" value="{{ Request::old('referencia', $cliente->enderecoCorrespondencia->referencia) }}">
                                            {{ $errors->first('referencia', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('bairro') ? 'has-error' : '' }}">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control uppercase" id="bairro" name="endereco[bairro]" value="{{ Request::old('bairro', $cliente->enderecoCorrespondencia->bairro) }}">
                                    {{ $errors->first('bairro', '<span class="help-block">:message</span>') }}
                                </div>

                                <div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control uppercase" id="cidade" name="endereco[cidade]" value="{{ Request::old('cidade', $cliente->enderecoCorrespondencia->cidade) }}">
                                    {{ $errors->first('cidade', '<span class="help-block">:message</span>') }}
                                </div>

                                <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control uppercase" id="estado" name="endereco[estado]" value="{{ Request::old('estado', $cliente->enderecoCorrespondencia->estado) }}">
                                    {{ $errors->first('estado', '<span class="help-block">:message</span>') }}
                                </div>
                            </div>

                        </div><!--row-->

                    </div><!--endereco-->

                    <div class="tab-pane" id="dependentes">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col-md-5">Nome</td>
                                                <th>Tipo</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($cliente->dependentes as $dependente)
                                            <tr>
                                                <td><a id="link-dependentes" href="{{ action('DependentesController@edit', $dependente->id) }}" target="_blank">{{ $dependente->nome }}</a></td>
                                                <td>{{ $dependente->dependenteTipo->nome }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">
                                                    Não existem dependentes cadastrados para este cliente.
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <a href="{{ action('ClientesController@createDependente', $cliente->id) }}" class="label label-success">Novo dependente</a>
                                </div>
                            </div>
                        </div>
                    </div><!--tab-dependentes-->

                 </div><!--tab-content-->
            </div>
        </div><!--col-md-12-->
    </div><!--row-->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group btn-cadastro">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-floppy-save"></i> Salvar</button>
                <a class="btn btn-link" onclick="history.back()">Voltar</a>
            </div>
        </div>
    </div>

</form>

{{-- Modal de confirmação de exclusão --}}

<div class="modal fade" id="{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Alerta</h4>
            </div>
            <div class="modal-body">
                <h5>Você tem certeza que deseja excluir este cliente? Esta ação não poderá ser desfeita.</h5>
            </div>
            <div class="modal-footer">
                <form class="pull-right" method="post" action="{{ action('ClientesController@destroy', $cliente->id) }}">
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