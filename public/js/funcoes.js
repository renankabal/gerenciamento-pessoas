    /*
    |--------------------------------------------------------------------------
    | Altera o campo input para UpperCase
    |--------------------------------------------------------------------------
    */
    function up(lstr){
        var str=lstr.value;
        lstr.value=str.toUpperCase();
    }

    /*
    |--------------------------------------------------------------------------
    | Chama a modal de documentos gerados do cliente
    |--------------------------------------------------------------------------
    */
    $(".visualizar_relatorios").click(function(e)
    {
        cliente_selecionado = $(this).attr('cliente-id');
        $("#relatoriosCliente").modal().show();
        e.preventDefault();
    });

    /*
    |--------------------------------------------------------------------------
    | Fecha os alert's de aviso
    |--------------------------------------------------------------------------
    */
    setTimeout(function () {
        $('#fechar').fadeOut(8000);
    }, 8000);

    /*
    |--------------------------------------------------------------------------
    | Transforma campo select para select2
    |--------------------------------------------------------------------------
    */
    $('.select2').select2();

    /*
    |--------------------------------------------------------------------------
    | Ativa o ToolTip
    |--------------------------------------------------------------------------
    */
    $('[data-toggle="tooltip"]').tooltip();

    /*
    |--------------------------------------------------------------------------
    | Monta o grafico de coluna
    |--------------------------------------------------------------------------
    */
    $(function () {
        $('#container').highcharts({
            credits:{
              enabled: false
            },
            data: {
                table: 'datatable'
            },        
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Valores'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    });