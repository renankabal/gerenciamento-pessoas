@extends('template.relatorios.boleto')
@section('title') Carnês de Pagamento @stop
@section('layout-conteudo')
@define $i = 0
@forelse($dados as $parcela)
 <style>
@page {
    /*       Up    <-  down  ->*/
    margin: 30px 19px 0px 29px;
}
        td .celula-carne {
        padding: 0px 12px 6px 0px;
        }
        .logo{
        min-height: 1px;
        padding: 0px;
        margin-bottom: 0px;
        padding-right: 0px;
        border: 0px;
        }
        .logo-img {
        max-width: 40px;
        max-height: 40px;
        margin-bottom: -5px;
        }
        p {
        position: relative;
        border-left: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 0 7px 7px 7px;
        margin: 0px;
        min-height: 1px;
        font-size: 12px;
        vertical-align: top;
        }
        .logo-td {
        width: 0%;
        padding-right: 10px;
        }
        .col-table-1 {
        width: 8.33333333%;
        }
        .col-table-2 {
        width: 16.66666667%;
        }
        .col-table-3 {
        width: 25%;
        }
        .col-table-4 {
        width: 33.33333333%;
        }
        .col-table-5 {
        width: 41.66666667%;
        }
        .col-table-6 {
        width: 50%;
        }
        .col-table-7 {
        width: 58.33333333%;
        }
        .col-table-8 {
        width: 66.66666667%;
        }
        .col-table-10 {
        width: 83.33333333%;
        }
        .col-table-11 {
        width: 91.66666667%;
        }
        .col-table-12{
        width: 100%;
        }
        .recibo-do-sacado {
            padding:0px !important;
            vertical-align: top !important;
        }
        span {
        display: block;
        color: #7f7f7f;
        font-size: 10px;
        text-transform: uppercase;
        }
        .span-down-title {
        color: #000;
        }
        .span-up-title {
            /*margin-top: -2px;*/
        }
        table{
        border-collapse: collapse;
        width: 100%;
        }
        </style>
<table>
    <tbody>
        <tr>
            <td class="recibo-do-sacado col-table-3">
                <table>
                    <tbody>
                        <tr>
                            <td class="col-table-12 celula-carne">
                                <p>
                                    <span class="span-up-title">ASSOCIADO</span> {{{$parcela->pessoa}}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-table-12 celula-carne">
                                <p>
                                    <span class="span-up-title">Descrição</span> {{{ $parcela->descricao }}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-table-12 celula-carne">
                                <p>
                                    <span class="span-up-title">Data do Pagamento</span>_____/_____/______
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-table-12 celula-carne">
                                <p>
                                    <span class="span-up-title">Valor Título</span>______________________
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-table-12 celula-carne">
                                <p>
                                    <span class="span-up-title">Valor Outros</span>______________________
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-table-12 celula-carne">
                                <p>
                                    <span class="span-up-title">Valor Pago</span>______________________
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td class="recibo-do-sacado" style="
    border-top: 0px dashed #8c8b8b;
    border-bottom: 0px dashed #8c8b8b;
    border-left: 2px dashed #8c8b8b;
    border-right: 0px dashed #8c8b8b;
    width: 2%;
">
</td>
            <td class="recibo-do-sacado col-table-9">
                <table>
                    <tbody>
                        <tr>
                            <td style="padding-bottom: 0px;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="logo-td">
                                                <p class="logo">
                                                    <img src="{{ asset('images/logo-sigep.png') }}">
                                                </p>
                                            </td>
                                            <td class="celula-carne col-table-12">
                                                <p>NOME DA EMPRESA
                                                    <span class="span-down-title">CNPJ: 99.999.999/9999-99</span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="celula-carne col-table-12">
                                                <p>
                                                    <span class="span-up-title">Nome do Associado</span> {{{$parcela->pessoa}}}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="celula-carne col-table-8">
                                                <p class="span-up-title">
                                                    <span>Descrição</span>
                                                    {{{ $parcela->descricao }}}
                                                    <span class="span-down-title">PARCELA: {{{ $parcela->parcela }}}</span>
                                                </p>
                                            </td>
                                            <td class="celula-carne col-table-3">
                                                <p class="span-up-title">
                                                    <span>Vencimento</span>{{{ format_date($parcela->data_vencimento) }}}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="celula-carne col-table-8">
                                                <p class="span-up-title">
                                                    <span>Sacado</span>{{{ $parcela->sacado }}}
                                                    <span class="span-down-title">
                                                        CPF:
                                                        @if(!empty($parcela->cpf))
                                                        {{{ $parcela->cpf }}}
                                                        @endif
                                                        @if(!empty($parcela->logradouro))
                                                        {{{ $parcela->logradouro }}},
                                                        @endif
                                                        @if(!empty($parcela->numero))
                                                        {{{ $parcela->numero }}}
                                                        @endif
                                                        @if(!empty($parcela->cidade))
                                                        {{{ $parcela->cidade }}},
                                                        @endif
                                                        @if(!empty($parcela->estado ))
                                                        {{{ $parcela->estado }}}
                                                        @endif
                                                    </span>
                                                </p>
                                            </td>
                                            <td class="celula-carne col-table-3">
                                                <p class="span-up-title">
                                                    <span>Valor do título:</span>R$ {{{ formataMoeda($parcela->valor_parcela) }}}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="celula-carne col-table-12" style="padding-bottom: 0px">
                                                <p>
                                                    <span class="span-up-title">IMPORTANTE</span>
                                                    
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
   &nbsp;
    <div class="corte"> </div>
    &nbsp;
    @define $i++
    @if($i % 3 == 0)
        <div style="page-break-after: always;"></div>
    @endif
@empty
    <center>Nenhuma parcela se encontra em aberto para o associado</center>
@endforelse
@stop   