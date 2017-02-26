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
			<a id="botao-novo" href="#" class="btn btn-default pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-users"></i> Pessoas</h2>
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

				{{--@foreach ($pessoas as $pessoa)--}}

					<tr>
						<td>{{-- $pessoa->nome --}}</td>
						<td>{{-- $pessoa->cadastro_nacional --}}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="#" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Editar</a>
								<a href="#" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i> Visualizar</a>
								<form class="pull-right" method="post" action="">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
									<button id="excluir-pessoa" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Excluir</button>
								</form>
							</div>
						</td>
					</tr>

				{{--@endforeach--}}

				</tbody>
			</table>
		</div>

		<div class="text-center">
		{{--$pessoas->render()--}}
		</div>

@stop