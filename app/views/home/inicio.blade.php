@extends('template.layout')

@section('content')
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}
<div class="row">
    <div class="col-md-12">
        <h3 class="page-head-line">Inicio</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{-- CALENDÁRIO--}}
        <div class="row">
            <div class="col-md-8">
                {{ $julius->generate() }}
            </div>

            {{-- EXIBE EVENTOS DO DIA--}}
            @if(!empty($eventosHoje))
            <div class="col-md-4">
                <div class="alert alert-success alert-dismissible fade in" role="alert" style="margin-bottom: 3px;padding: 3px;">
                    <center>Eventos de hoje</center>
                </div>
                <div style="height: 300px;overflow-y: scroll;overflow-x: hidden;">
                    @foreach($eventosHoje as $key => $evento_hoje)
                        <div class="alert alert-info alert-dismissible fade in" role="alert" style="margin-bottom: 3px;">
                            <i class="fa {{{ $evento_hoje['icone'] }}}" style="font-size: 30px;"></i> <b>{{{ $evento_hoje['nome'] }}}</b> hoje ás {{{ formata_hora($evento_hoje['hora_evento']) }}}.
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        {{-- ATALHOS (LINHA 1)--}}
        <div class="row">
            <div class="col-md-3">
                <a href="{{action('ClientesController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/user.png" width="50%">
                        <h5>Pessoa</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{action('DebitosController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/folder_full.png" width="50%">
                        <h5>Cobrança</h5>
                    </div>
                </a>                
            </div>
            <div class="col-md-3">
                <a href="{{action('UsuarioController@index')}}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/lock.png" width="50%">
                        <h5>Usuário</h5>
                    </div>
                </a>
            </div>            
            <div class="col-md-3">
                <a href="{{ url('sair') }}">
                    <div class="main-box mb-branco">
                        <img src="icones/grandes/delete.png" width="50%">
                        <h5>Sair</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- VALORES PAGO POR MÊS (LINHA 2)--}}
    <div class="col-md-12">
        <div id="faturamento" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#faturamento').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Faturamento'
                },
                xAxis: {
                    categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                },
                yAxis: {
                    title: {
                        text: 'Faturamento em R$'
                    }
                },
                credits:{
                    enabled: false
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Mês/Ano',
                    data: [{{ $quantidade_valores}}]
                }]
            });
        });
        </script>
    </div>
    {{-- VALORES PAGO POR MÊS (LINHA 3)--}}
    <div class="col-md-12">
        <div id="receber" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#receber').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Parcelas pendentes a receber'
                },
                subtitle: {
                    text: 'Total das parcelas vencidas no mês.'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total'
                    }
                },
                credits:{
                    enabled: false
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: 'R$ {point.y:.1f}'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>R$ {point.y:.2f}</b><br/>'
                },
                series: [{
                    name: 'Total do mês',
                    colorByPoint: true,
                    data: [
                        @foreach($projecao as $dado)
                            @define $mes = formata_mes($dado->mes);
                            {{" { name: '$mes', y: $dado->valor }, "}}
                        @endforeach
                    ]
                }]
            });
        });
        </script>
    </div>
    {{-- VALORES PAGO POR MÊS (LINHA 4)--}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {{-- Exibe as oportunidades por operador--}}
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i>Relatórios
                    </div>
                    <div class="panel-body">
                        <div class="list-group">

                        </div>
                        {{-- <a href="#" class="btn btn-info btn-block">Ver detalhes</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="associados" style="min-width: 155px; height: 250px; margin: 0 auto"></div>
                <script type="text/javascript">
                    $(document).ready(function ()
                    {
                        $('#associados').highcharts({
                            chart: {
                                type: 'pie',
                                options3d: {
                                    enabled: false,
                                    alpha: 30,
                                    beta: 0
                                }
                            },
                            title: {
                                text: 'Total de associados por gênero'
                            },
                            tooltip: {
                                pointFormat: '<b>{series.name}:</b> {point.percentage:.1f}% - <b>Total de:</b> {point.y}'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    depth: 150,
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b> - {point.percentage:.1f}%'
                                    }
                                }
                            },
                            credits:{
                                enabled: false
                            },
                            series: [{
                            name: 'Porcentagem',
                            colorByPoint: true,
                            data: [
                            @foreach($pessoas_sexo as $sexo)
                                @if($sexo->sexo == 'M')
                                    @define $nome ="MASCULINO";
                                @else
                                    @define $nome ="FEMININO";
                                @endif
                                {{" { name: '$nome', y: $sexo->total }, "}}
                            @endforeach
                            ]
                        }]
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal de eventos -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Eventos do dia <b><span id="dataEvento"></span></b></h4>
            </div>
            <div class="modal-body">                
                <div id="listaEventos"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@stop
{{ HTML::script('template/assets/js/jquery-2.0.2.min.js') }}
<script>
    $(document).delegate('#selecionaEvento', 'click', function(event){
        $('#exibeEventosDetalhados').remove();
        $('#mostraDataEvento').remove();

        var data_evento = $(this).attr('data-evento');

        var data  = ($(this).attr('data-evento')).split("-");     
        var dataEvento = '<span id="mostraDataEvento"><b>'+data[2]+'/'+data[1]+'/'+data[0]+'</b></span>'; 
        $('#dataEvento').append(dataEvento);

        
        $.ajax({
            url: '/home/eventos/lista_eventos/'+data_evento,
            type: 'GET',
            dataType: 'JSON',
            data: {},
        })
        .done(function(retorno) {
            console.log(retorno);
            if(retorno.data!=null){
                htmlEventos  = '<div id="exibeEventosDetalhados">\
                                    <table class="table table-bordered">';
                $.each(retorno.data, function(index, val){
                        htmlEventos += '<tr>\
                                            <td width="5%" align="center"><i class="fa '+val.icone+'" style="font-size: 60px;"></i></td>\
                                            <td width="95%">'
                                                +val.nome+'<br>\
                                                Data: '+val.data_evento+'<br>\
                                                Hora: '+val.hora_evento+'<br>\
                                            </td>\
                                        </tr>';
                });
                htmlEventos  +='    </table>\
                                </div>';
                $("#listaEventos").append(htmlEventos);            
            }
         });
    });
</script>