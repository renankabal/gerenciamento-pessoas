@extends('template.layout')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<form method="get" action="#">
				<div class="input-group">
				  <input type="text" id="busca" name="busca" class="form-control">
				  <span class="input-group-btn">
				    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Buscar</button>
				  </span>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a id="botao-novo" href="{{ action('CrmController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
			<h2><i class="fa fa-commenting-o"></i> Crm</h2>
		</div>
	</div>

	<hr>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th width="40%">Nome</th>
					<th width="30%">Agendamento</th>
					<th width="13%">Situaçao</th>
				</thead>
				<tbody>
				@forelse ($crms as $crm)
					<tr>
						<td>{{ $crm->oportunidade }}</td>
						<td>{{ $crm->data_agendamento }}</td>
						<td>{{ $crm->status }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a href="{{ action('CrmController@edit', $crm->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
								<a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Visualizar"><i class="glyphicon glyphicon-eye-open"></i></a>
							</div>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="4">
						    <div class="alert alert-warning" id="fechar" role="alert">
						        Nenhuma crm cadastrado! Clique no botão <span class="label label-success"><i class="glyphicon glyphicon-plus"></i> Novo</span>
						    </div>
						</td>
					</tr>
				@endforelse
				</tbody>
			</table>
		</div>

		<div class="alert alert-danger" role="alert">
			<i class="fa fa-ban"></i> Exibição de todos os CRM'S da pessoa.
        </div>

		<div class="text-center">
			{{-- {{ $crms->links() }} --}}
		</div>
@stop