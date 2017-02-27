<html>
  <head>
    <title>Comprovante</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style>
        html{
            font-family: Verdana;
            text-align: center;
            margin: 0 auto;
            height: 500px;
            width: 350px;
        }
        .unidade{
            font-size: 10px;
            border: 1px solid #ccc;
            margin: 5px;
        }
        .dados_emprestimo td{
            text-align:  center;
            font-size: 10px;
        }
        td{
            padding: 4px;
        }
        table{
            width:100%;
            border-radius: 1px;
        }
        .impresso_em{
            bottom: 100%;
            text-align: left;
            font-size: 8px;
        }
        .atendente{
            text-align: left;
            font-size: 8.2px;
        }
        #quebra{ page-break-before: always }
        </style>
        <style media="print">
            @page{
                width: 350px;
                height: 500px;
                margin: 2px;
            }
            .unidade{
                font-size: 10px;
            }
            table{
                width: 100%;
            }
             #quebra{ page-break-before: always }            
        </style>
    </head>

    <body marginwidth="0" marginheight="0">

        @section('layout-conteudo')
            <p><br /></p>
            <p><br /></p>
                <p>Inserir seu Conteúdo aqui</p>
            <hr/>
        @show

    </body>
</html>