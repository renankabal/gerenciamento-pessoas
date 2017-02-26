<div class="container" style="margin-top:20px">
    {{ Form::open(array(
        'url' => 'entrar',
        'class'  => 'form-signin'
    )) }}
        <div align="center">
            <img src="{{ asset('images/logo.png') }}" width="70%">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
            <div class="form-group">
                {{ Form::email('email', '', array('class' => 'form-control input-lg', 'autofocus', 'placeholder' => 'E-mail')) }}
            </div>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
            <div class="form-group">
                {{ Form::password('senha', array('class' => 'form-control input-lg', 'placeholder' => 'Senha', 'onkeyup' => 'javascript:verifica()', 'id' => 'senha')) }}
            </div>
        </div>
            <table id="mostra"></table>
        <br>
        @if (Session::has('flash_error'))
            <div class="alert alert-danger" id="fechar">
                <i class="fa fa-ban"></i> E-mail ou senha inválidos.
            </div>
        @endif
        <label>
            {{ Form::checkbox('remember', 'remember', false) }} Lembre-se de mim
        </label>
        {{ Form::submit('Entrar', array('class' => 'btn btn-lg btn-primary btn-block')) }}
        <a href="#">Esquecir minha senha</a>
    {{ Form::close() }}
<!-- Fim da função das telas de aviso -->
</div> <!-- /container -->