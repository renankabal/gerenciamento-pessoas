@extends('template.layout')

@section('content')

	<ol class="breadcrumb">
		<li><a href="{{action('HomeController@home')}}">Principal</a></li>
		<li><a href="{{action('DependentesController@index')}}">Dependentes</a></li>
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
			<a id="botao-novo" href="{{ action('DependentesController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-users"></i> Dependentes</h2>
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

				@forelse ($dependentes as $dependente)

					<tr>
						<td>{{{ $dependente->nome }}}<br>
							<span class="label label-default">
								{{{ $dependente->tipo }}} de {{{ $dependente->cliente }}} 
							</span>
						</td>
						<td>{{{ $dependente->cpf }}}</td>
						<td>
							<div class="btn-group" role="group">
                                <a type="button" href="{{ action('DependentesController@edit', $dependente->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </div>
						</td>
					</tr>

				@empty

					<tr>
						<td colspan="3">
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
		{{ $dependentes->links() }}
		</div>

@stop