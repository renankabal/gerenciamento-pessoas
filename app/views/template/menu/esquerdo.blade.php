<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <center>
                        <?php $imagem = "upload/perfis/".Auth::user()->foto?>
                        @if (!Auth::user()->foto)
                            <img src="{{ asset('template/assets/img/user.jpg') }}" class="img-circle">
                        @else
                            <img src="{{ asset($imagem) }}" class="img-circle">                            
                        @endif
                        <div class="perfil">
                            <?php
                                #Pega Nome e Sobrenome
                                $nome_usuario = explode(' ', trim(Auth::user()->nome));
                                $cont = count($nome_usuario)-1;
                            ?>
                            {{ $nome_usuario[0]." ".$nome_usuario[$cont] }}<br>
                            <?php
                            #Criptografa o ID do usuario
                            $hash = Crypt::encrypt(Auth::user()->id);
                            ?>
                            {{ HTML::link("perfil/editar/$hash", 'Editar perfil') }} <i class="fa fa-cogs"></i></a>
                        </div>
                    </center>
                </div>
            </li>
            <li>
                <a {{ (Request::is('*home') ? 'class="active-menu"' : '') }} href="{{action('HomeController@home')}}"><i class="fa fa-home"></i>Início</a>
            </li>
            <li {{ (Request::is('*clientes*') || Request::is('*dependentes*') ? 'class="active"' : '') }}>
                <a href="#"><i class="fa fa-user-o"></i>Pessoas <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a {{ (Request::is('*clientes*') ? 'class="active-menu"' : '') }} href="{{action('ClientesController@index')}}"><i class="fa fa-address-card-o"></i>Pessoas</a>
                    </li>
                    <li>
                        <a {{ (Request::is('*dependentes*') ? 'class="active-menu"' : '') }} href="{{action('DependentesController@index')}}"><i class="fa fa-users"></i>Dependentes</a>
                    </li>
                </ul>
            </li>

            <li {{ (Request::is('*debitos*') ? 'class="active"' : '') }}>
                <a href="#"><i class="fa fa-money"></i>Financeiro <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a {{ (Request::is('*debitos*') ? 'class="active-menu"' : '') }} href="{{action('DebitosController@index')}}"><i class="fa fa-address-card-o"></i>Débitos</a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->perfil_id == 1)
            <li>
                <a href="#"><i class="fa fa-user"></i>Usuarios <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{action('UsuarioController@index')}}"><i class="fa fa-user-plus"></i>Lista</a>
                    </li>
                    <li>
                        <a href="{{action('PerfilController@index')}}"><i class="fa fa-bell"></i>Perfis</a>
                    </li>
                </ul>
            </li>
            @endif
            <li>
                <a href="{{ url('sair') }}"><i class="fa fa-sign-out"></i>Sair</a>
            </li>
        </ul>
    </div>
</nav>