@extends('template.layout')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<form method="get" action="#">
				<div class="input-group">
				  <input type="text" id="busca" name="busca" class="form-control">
				  <span class="input-group-btn">
				    <button class="btn btn-default" type="submit">Buscar</button>
				  </span>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a id="botao-novo" href="{{ action('ZonasController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-users"></i> Zonas</h2>
		</div>
	</div>

	<hr>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th width="45%">Nome</th>
					<th width="40%">Identificador</th>
					<th width="15%">Ações</th>
				</thead>
				<tbody>

				@foreach ($zonas as $zona)

					<tr>
						<td>{{ $zona->nome }}</td>
						<td>{{ $zona->identificacao }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="#" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="#" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i></a>
								<form class="pull-right" method="post" action="">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
									<button type="submit" class="btn btn-danger btn-sm excluir-item"><i class="glyphicon glyphicon-remove"></i></button>
								</form>
							</div>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
		</div>

		<div class="text-center">
			{{ $zonas->links() }}
		</div>

@stop