@extends('template.layout')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{action('HomeController@home')}}">Principal</a></li>
        <li><a href="{{action('DebitosController@index')}}">Debitos</a></li>
    </ol>

    <i class="fa fa-user-o" style="font-size:25px;"></i>
    <span style=font-size:17px;font-weight:bold>Débitos de {{ $pessoa }}</span>

    <hr>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <th>Parcela</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th align="center">Data de vencimento</th>
                    <th align="center">Status</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                @foreach($parcelas as $parcela)
                <tr> 
                    <td>{{{ $parcela->parcela }}}</td>
                    <td>{{{ $parcela->descricao }}}</td>
                    <td>R$ {{ formataMoeda($parcela->valor_parcela) }}</td>
                    <td align="center">{{ format_date($parcela->data_vencimento) }}</td>
                    <td>{{  $parcela->status_parcela() }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            {{-- Se a parcela já tiver sido paga gera o comprovante de pagamento --}}
                            @if($parcela->parcela_finalizada)
                                <a class="btn btn-default"  target="_blank" title="Emitir comprovante de pagamento" href="{{action('RelatoriosController@comprovante',$parcela->parcela_id)}}">
                                    <i class="fa fa-check-square-o"></i>
                                </a>
                            @else
                                <a type="button" href="{{ action('ParcelasController@efetuaPagamento', $parcela->parcela_id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Efetuar pagamento">
                                    <i class="fa fa-usd"></i>
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{-- {{ $parcelas->links() }} --}}
        </div>
@stop
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}
<script>

</script>