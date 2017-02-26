@extends('template.layout')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="{{action('HomeController@home')}}">Principal</a></li>
				<li class="active">Homologação</li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form method="get" action="{{ action('HomologacaoController@find') }}">
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
			<h2><i class="fa fa-users"></i> Homologação</h2>
		</div>
	</div>

	<hr>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th width="40%">Nome</th>
					<th width="20%">E-mail</th>
					<th width="15%">Empresa</th>
					<th width="15%">Contato</th>
					<th width="10%">Ações</th>
				</thead>
				<tbody>
				@forelse ($oportunidades as $oportunidade)
					<tr>
						<td>
							{{ $oportunidade->nome }}<br>
							<span class="label label-default">
								cadastrado por: {{ $oportunidade->usuario }} 
							</span>
						</td>
						<td>{{ $oportunidade->email }}</td>
						<td>{{ $oportunidade->oportunidadeEmpresa->nome }}</td>
						<td>{{ $oportunidade->telefone }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="{{ action('HomologacaoController@edit', $oportunidade->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="{{ action('CrmController@createCrm', $oportunidade->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Cadastrar CRM"><i class="fa fa-arrow-right"></i></a>
							</div>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4">
						    <div class="alert alert-warning" id="fechar" role="alert">
						        Nenhuma oportunidade encontrada.
						    </div>
						</td>
					</tr>
				@endforelse
				</tbody>
			</table>
		</div>

		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-ban"></i> Quando o status da pessoa é alterado para <strong>Finalizado</strong> ou <strong>Cancelado</strong>, ela sai automaticamente da lista de homologação.
        </div>

		<div class="text-center">
			{{ $oportunidades->links() }}
		</div>
@stop