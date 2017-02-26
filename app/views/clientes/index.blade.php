@extends('template.layout')

@section('content')
	@include('clientes.relatorios')

	<ol class="breadcrumb">
		<li><a href="{{action('HomeController@home')}}">Principal</a></li>
		<li><a href="{{action('ClientesController@index')}}">Pessoas</a></li>
	</ol>

	<div class="row">
		<div class="col-md-12">
			<form method="get" action="{{ action('ClientesController@find') }}">
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
			<a id="botao-novo" href="{{ action('ClientesController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-users"></i> Pessoas</h2>
		</div>
	</div>

	<hr>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th width="60%">Nome</th>
					<th width="20%">CPF</th>
					<th width="20%">Ações</th>
				</thead>
				<tbody>
				@forelse ($clientes as $cliente)
					<tr>
						<td>{{ $cliente->nome }}</td>
						<td>{{ $cliente->cpf }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="{{ action('ClientesController@edit', $cliente->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="{{ action('ClientesController@createDependente', $cliente->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Incluir dependente"><i class="fa fa-users"></i></a>
								<a class="btn btn-default visualizar_relatorios" cliente-id="{{ $cliente->id }}"  cliente-nome="{{ $cliente->nome }}" role="button" data-toggle="tooltip" data-placement="top" title="Documentos"><i class="fa fa-file-text-o"></i></a>
							</div>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4">
						    <div class="alert alert-warning" role="alert">
						        Nenhum cliente encontrado.
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
</script>