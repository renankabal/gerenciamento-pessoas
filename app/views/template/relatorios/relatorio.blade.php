<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
                Relatório
            @show
        </title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        {{ HTML::style('css/relatorio-pdf.css')}}
        </head>
    </head>
    <body>
        <div class="container">
            <div>
                @section('layout-conteudo')
                    <p><br /></p>
                    <p><br /></p>
                        <p>Inserir seu Conteúdo aqui</p>
                        
                    <hr/>
                @show
            </div>
        </div>
    </body>
</html>