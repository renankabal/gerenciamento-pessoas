<html>
    <head>
        <title>
        @section('title') Boleto @show
        </title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="alternate" href="{{public_path('css/boleto/boleto.css')}}" />
        {{-- <link media="all" type="text/css" rel="stylesheet" href="http://localhost:8001/css/boleto/boleto.css"> --}}
        <!-- {{ HTML::style('public/css/boleto/boleto.css') }} -->
    </head>
    <body marginwidth="0" marginheight="0">
        @section('layout-conteudo')
            <p>Inserir seu Conteúdo aqui</p>
        @show
    </body>
</html>