<html>
  <head>
    <title>Relatório</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="alternate" href="{{public_path('css/relatorio-pdf.css')}}" />
    </head>

    <body marginwidth="0" marginheight="0">
        {{-- 
        @section('layout-cabecalho')
            @include('template.relatorios.cabecalho')
        @show
         --}}
        @section('layout-conteudo')
            <p><br /></p>
            <p><br /></p>
                <p>Inserir seu Conteúdo aqui</p>
            <hr/>
        @show

        @section('layout-data')
            {{-- Parcial de rodapé --}}
            @include('template.relatorios.data_extenso')
        @show

        @section('layout-assinatura')
            {{-- Parcial de rodapé --}}
            @include('template.relatorios.assinatura_contrato')
        @show

        {{-- Parcial de rodapé
        @section('layout-rodape')
            @include('template.relatorios.rodape')
        @show
         --}}
    </body>
</html>
