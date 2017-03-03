@extends('template.layout')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{action('HomeController@home')}}">Principal</a></li>
        <li><a href="{{action('EventosController@index')}}">Eventos</a></li>
    </ol>

    {{-- Filtro de nome/cpf da pessoa --}}
    <?php
        $pesquisa2 = Input::get('busca');
    ?>
    <div class="row">
        <div class="col-md-12">
            <form method="get" action="{{ action('EventosController@index') }}">
                <div class="input-group">
                    <input type="text" id="busca" name="busca" class="form-control uppercase" placeholder="Busca por eventos" value="{{ $pesquisa2 }}">
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
            <a id="botao-novo" href="{{ action('EventosController@create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Novo</a>
        </div>
    </div>

    <hr>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <th>Evento</th>
                    <th>Data do evento</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                @foreach($eventos as $evento)
                <tr> 
                    <td>{{{ $evento->nome }}}</td>
                    <td>{{{ format_date($evento->data_evento) }}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a type="button" href="{{ action('EventosController@edit', $evento->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>                       
                        </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $eventos->links() }}
        </div>
@stop
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}
<script>

</script>