@extends('template.layout')

@include('debitos.relatorios')

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
                            <a class="btn btn-default visualizar_relatorios" debito-id="{{ $debito->id }}"  debito-nome="{{ $debito->nome }}" role="button" data-toggle="tooltip" data-placement="top" title="Visualizar relatorios">
                                <i class="fa fa-search"></i>
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
    $(document).delegate('.visualizar_relatorios', 'click', function(e)
    {
        var pessoa_nome  = $(this).attr('debito-nome');
        var pessoa_id    = $(this).attr('debito-id');
        $('#nomePessoa').remove();
        
        $('#pessoaNome').append('<span id="nomePessoa">'+pessoa_nome+'</span>');
        $('[name=pessoaId]').val(pessoa_id);
        
        $("#relatoriosFinanceiro").modal().show();

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