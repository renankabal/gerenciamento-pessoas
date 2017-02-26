<div class="corpo_carteira">
    <div class="carteirinha">
        <img class="img_fundo" src="{{{ asset('images/carteirinha/carteira_cedap_frente_costa_2.png') }}}">
    </div>
    <div class="conteudo">
    <div class="validade">
        <b>VALIDADE</b><br> 
            <b>xxxx</b>
        </a>
    </div>
    <div class="caixa-texto-oito">
        <img src="{{asset('images/logo-sigep.png')}}">
    </div>
        <img class="sem-foto" src="{{{ asset('images/carteirinha/foto.jpg') }}}" >

        <div class="caixa-texto-um">
            <b>NOME: {{{ $dados->nome }}}</b>
        </div>
        <div class="caixa-texto-dois">
            <b>MATRICULA: {{{ $dados->matricula }}} </b>
        </div>
        <div class="caixa-texto-tres">
            <b>CPF: {{{ $dados->cpf }}} </b>
        </div>
        <div class="caixa-texto-quatro">
            <b>PROFISSÃO: {{{ $dados->profissao }}}</b>
        </div>
    </div>
</div>
<br>