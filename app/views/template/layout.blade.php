<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    {{-- Adicionado arquivo do head --}}
    @include('template.head')
<body>
    <div id="wrapper">
        {{-- Adicionado topo --}}
        @include('template.topo.topo')
        
        {{-- Adicona menu lateral --}}
        @include('template.menu.esquerdo')
        
        {{-- Inicia arquivos de conteudo --}}
        <div id="page-wrapper">
            <div id="page-inner">

                @if (Session::has('mensagem'))
                    <div class="alert alert-info" role="alert" id="fechar">
                        <i class="glyphicon glyphicon-ok"></i> {{ Session::get('mensagem') }}
                    </div>
                @endif
                
                {{-- Route::currentRouteName() --}}
                @yield('content')

            </div>
        </div>

    </div>
    {{-- Adicionado arquivo do rodape --}}
    @include('template.rodape.rodape')
    
    {{-- Adicionado arquivo de js --}}
    @include('template.js')
</body>
</html>
