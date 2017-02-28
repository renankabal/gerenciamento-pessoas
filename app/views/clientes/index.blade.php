@extends('template.layout')

@section('content')
	@include('clientes.relatorios')

	<ol class="breadcrumb">
		<li><a href="{{action('HomeController@home')}}">Principal</a></li>
		<li><a href="{{action('ClientesController@index')}}">Pessoas</a></li>
	</ol>

	{{-- Filtro de nome/cpf da pessoa --}}
    <?php
    	$pesquisa2 = Input::get('busca');
    ?>
	<div class="row">
		<div class="col-md-12">
			<form method="get" action="{{ action('ClientesController@index') }}">
				<div class="input-group">
				    <input type="text" id="busca" name="busca" class="form-control uppercase" placeholder="Busca por nome ou cpf" value="{{ $pesquisa2 }}">
				    <div class="input-group-btn">
				    	@if ($pesquisa2)
					    	<button type="submit" class="btn btn-default" id="form-pesquisa-limpar">
					    		<i class="fa fa-times"></i> Limpar
					    	</button>
				    	@endif
				    	<button type="submit" class="btn btn-default">
				    		<i class="glyphicon glyphicon-search"></i> Buscar
				    	</button>
				    </div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a id="botao-novo" href="{{ action('ClientesController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-users"></i> Pessoas</h2>
		</div>
	</div>
	<hr>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
                    <th width="5%">Matricula</th>
					<th width="60%">Nome</th>
					<th width="10%">CPF</th>
                    <th width="5%">Status</th>
					<th width="15%">Ações</th>
				</thead>
				<tbody>
				@forelse ($clientes as $cliente)
					<tr>
                        <td>{{ $cliente->matricula }}</td>
						<td>{{ $cliente->nome }}</td>
						<td>{{ $cliente->cpf }}</td>
                        <td>
                            @if($cliente->ativo)
                                <span class="label label-success">SIM</span>
                            @else
                                <span class="label label-danger">NÃO</span>
                            @endif
                        </td>
						<td>
                            <div class="btn-group" role="group">
                                <a type="button" href="{{ action('ClientesController@edit', $cliente->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a type="button" href="{{ action('ClientesController@createDependente', $cliente->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Incluir dependente">
                                    <i class="fa fa-users"></i>
                                </a>
                                <a class="btn btn-default visualizar_relatorios" cliente-id="{{ $cliente->id }}"  cliente-nome="{{ $cliente->nome }}" role="button" data-toggle="tooltip" data-placement="top" title="Visualizar relatorios">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4">
						    <div class="alert alert-warning" role="alert">
						        Nenhuma pessoa encontrado.
						    </div>
						</td>
					</tr>
				@endforelse

				</tbody>
			</table>
		</div>

		<div class="text-center">
			{{ $clientes->links() }}
		</div>

@stop
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}
<script>
	$(document).delegate('.visualizar_relatorios', 'click', function(e)
    {
        var pessoa_nome  = $(this).attr('cliente-nome');
        var pessoa_id    = $(this).attr('cliente-id');
        $('#nomePessoa').remove();
        
        $('#pessoaNome').append('<span id="nomePessoa">'+pessoa_nome+'</span>');
        $('[name=pessoaId]').val(pessoa_id);
        
        $("#relatoriosCliente").modal().show();

        e.preventDefault();
    });

	// Função exibir os relatórios do cadastro de matrículas
    $(document).delegate('.relatorio_pessoa', 'click', function(e)
    {
        var pessoa_selecionada = $('[name=pessoaId]').val();
        var link = $(this).attr('link');
        window.open(link+pessoa_selecionada);
    });

    $(document).delegate('#form-pesquisa-limpar', 'click', function(e)
    {
    	$('#busca').val("");
    });
</script>