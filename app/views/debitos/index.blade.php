@extends('template.layout')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{action('HomeController@home')}}">Principal</a></li>
        <li><a href="{{action('DebitosController@index')}}">Debitos</a></li>
    </ol>

    {{-- Filtro de nome/cpf da pessoa --}}
    <?php
        $pesquisa2 = Input::get('busca');
    ?>
    <div class="row">
        <div class="col-md-12">
            <form method="get" action="{{ action('DebitosController@index') }}">
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
            <a id="botao-novo" href="{{ action('DebitosController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
        </div>
    </div>

    <hr>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Valor da parcela</th>
                    <th align="center">Quantidade</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                @foreach($debitos as $debito)
                <tr> 
                    <td>{{{ $debito->cliente }}}</td>
                    <td>{{{ $debito->cpf }}}</td>
                    <td>R$ {{ formataMoeda($debito->valor_debito) }}</td>
                    <td align="center">{{{ $debito->quantidade_parcelas }}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a type="button" href="{{ action('DebitosController@edit', $debito->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a type="button" href="{{ action('DebitosController@lista_parcelas', $debito->debito_id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Visualizar parcelas">
                                <i class="fa fa-clone"></i>
                            </a>
                            <a type="button" href="{{ action('RelatoriosController@carne_avulso', $debito->debito_id) }}" target="_blank" class="btn btn-default" role="button" data-toggle="tooltip" data-placement="top" title="Imprimir carnê">
                                <i class="fa fa-print"></i>
                            </a>
                            <a class="btn btn-danger" title="Excluir este registro" href="{{action('DebitosController@destroy', $debito->debito_id)}}", title="Deseja excluir o débito selecionado?">
                            <i class="fa fa-trash-o"></i>
                        </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $debitos->links() }}
        </div>
@stop
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}
<script>

</script>