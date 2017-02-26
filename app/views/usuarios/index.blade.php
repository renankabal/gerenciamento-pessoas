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
			<a id="botao-novo" href="{{ action('UsuarioController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-users"></i> Usuarios</h2>
		</div>
	</div>
	<hr>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th width="45%">Nome</th>
					<th width="40%">Email</th>
					<th width="15%">Ações</th>
				</thead>
				<tbody>
				@foreach ($usuarios as $usuario)
					<tr>
						<td>
							{{ $usuario->nome }}<br>
							{{-- {{ $usuario->perfis->nome }} --}}
						</td>
						<td>{{ $usuario->email }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Visualizar"><i class="glyphicon glyphicon-eye-open"></i></a>
								<form class="pull-right" method="post" action="">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
									<button type="submit" class="btn btn-danger btn-sm excluir-item" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash-o"></i></button>
								</form>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="text-center">
			{{ $usuarios->links() }}
		</div>
@stop