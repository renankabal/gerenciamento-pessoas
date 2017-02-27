@extends('template.relatorios.comprovante')
@section('layout-conteudo')
<table class="unidade" border="0">
    <tbody>
        <tr>
            <td colspan="2" align="center">
                <img src="{{ asset('images/logo-sigep.png') }}"><br>
                <b>NOME DA EMPRESA</b><br>
                <b>SUBTITULO</b><br>
                <b>CNPJ: 99.999.999/9999-99</b><br>
                <hr/>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center" align="center">
                <b>COMPROVANTE DE PAGAMENTO</b><br/>
                <hr/>
            </td>
        </tr>
        <tr>
            <td><b>NOME: </b>{{{ $dados->pessoa }}}</td>
        </tr>
        <tr>
            <td><b>CPF: </b>{{{ $dados->cpf }}}</td>
        </tr>
        <tr>
            <td><b>Nº MATRÍCULA: </b>{{{ $dados->matricula }}}</td>
        </tr>
        <tr>
            <td colspan="2">
                <hr/>
            </td>
        </tr>
        <tr>
            <td colspan='2'><b>DÉBITO: </b>{{{ $dados->descricao }}}</td>
        </tr>
        <tr>
            <td colspan='2'>
                <b>dados: </b>{{{ $dados->parcela }}} no valor de R$ {{{ $dados->valor_parcela }}}
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <b>DATA DE VENCIMENTO:</b> {{{ format_date($dados->data_vencimento) }}}
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <b>VALOR PAGO:</b> R$ {{{ formataMoeda($dados->valor_pago) }}}
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <b>DATA DE PAGAMENTO:</b> {{{ format_date($dados->data_pagamento) }}}
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <hr/>
        </tr>
        <tr>
            <td class="impresso_em" colspan="2">
                <center>Emitido em: {{ format_date(date('Y-m-d')) }} ás {{ date('H:i:s') }}</center>
            </td>
        </tr>
    </tbody>
</table>
<script>
    window.print();
    //self.close();
</script>
@stop