@extends('template.layout')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="{{action('HomeController@home')}}">Principal</a></li>
				<li class="active">Oportunidades</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form method="get" action="{{ action('OportunidadesController@find') }}">
				<div class="input-group">
				  <input type="text" id="busca" name="busca" class="form-control" placeholder="Busca" required>
				  <span class="input-group-btn">
				    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Buscar</button>
				  </span>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a id="botao-novo" href="{{ action('OportunidadesController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-commenting-o"></i> Oportunidades</h2>
		</div>
	</div>

	<hr>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th width="40%">Nome</th>
					<th width="30%">E-mail</th>
					<th width="13%">Telefone</th>
					<th width="17%">Ações</th>
				</thead>
				<tbody>
				@forelse ($oportunidades as $oportunidade)
					<tr>
						<td>{{ $oportunidade->nome }}</td>
						<td>
							@if($oportunidade->email)
								{{ $oportunidade->email }}
							@else
								<span class="label label-warning">
									não cadastrado
								</span>
							@endif
							</td>
						<td>{{ $oportunidade->telefone }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="{{ action('OportunidadesController@edit', $oportunidade->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="{{ action('CrmController@createCrm', $oportunidade->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Cadastrar CRM"><i class="fa fa-arrow-right"></i></a>
								<span data-toggle="modal" data-target="#{{ $oportunidade->id }}">
								    <a class="btn btn-danger btn-sm excluir-item" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></a>
								</span>
							</div>
						</td>
					</tr>

					{{-- Modal de confirmação de exclusão --}}

					<div class="modal fade" id="{{$oportunidade->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="gridSystemModalLabel">Alerta</h4>
								</div>
								<div class="modal-body">
									<h5>Você tem certeza que deseja cancelar esta oportunidade?</h5>
								</div>
								<div class="modal-footer">
									<form class="pull-right" method="post" action="{{ action('OportunidadesController@destroy', $oportunidade->id) }}">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
										<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
										<button type="submit" class="btn btn-danger">Sim</button>
									</form>
								</div>
							</div>
						</div>
					</div>

				@empty
					<tr>
						<td colspan="4">
						    <div class="alert alert-warning" role="alert">
						        Nenhuma oportunidade foi encontrada.
						    </div>
						</td>
					</tr>
				@endforelse
				</tbody>
			</table>
		</div>

		<div class="alert alert-danger" role="alert">
			<i class="fa fa-ban"></i> Atenção! quando a pessoa é vinculada a algum <b>CRM</b>, ela sai automaticamente da lista de oportunidades.
        </div>

		<div class="text-center">
			{{ $oportunidades->links() }}
		</div>

@stop