$(function(){

	/*
	|--------------------------------------------------------------------------
	| Consulta CEP | Web Service
	|--------------------------------------------------------------------------
	*/
	$('#cep').blur(function(){

		var cep = $('#cep').val().replace(/[^\d]/g, "");

		if ($('#cep').val() != '') {

			$.ajax({
				url: 'http://cep.correiocontrol.com.br/' + cep + '.json',
				type: 'GET',
				dataType: 'json',
				beforeSend: function(){ $('#gif-loading').css('display', 'inline')},
				success: function(json) {
					$('#gif-loading').css('display', 'none');
					$('#logradouro').val(json.logradouro);
					$('#bairro').val(json.bairro);
					$('#cidade').val(json.localidade);
					$('#estado').val(json.uf);

					$('#msg-cep').css('display', 'none');
				},
				error: function() {
					$('#msg-cep').css('display', 'inline');
					$('#cep').focus();
				},
				complete: function() {
					$('#gif-loading').css('display', 'none');
				}
			});
		}
	});

	$('#_cep').blur(function(){

		var _cep = $('#_cep').val().replace(/[^\d]/g, "");

		if ($('#_cep').val() != '') {

			$.ajax({
				url: 'http://cep.correiocontrol.com.br/' + _cep + '.json',
				type: 'GET',
				dataType: 'json',
				beforeSend: function(){ $('#_gif-loading').css('display', 'inline')},
				success: function(json) {
					$('#_gif-loading').css('display', 'none');
					$('#_logradouro').val(json.logradouro);
					$('#_bairro').val(json.bairro);
					$('#_cidade').val(json.localidade);
					$('#_estado').val(json.uf);

					$('#_msg-cep').css('display', 'none');
				},
				error: function() {
					$('#_msg-cep').css('display', 'inline');
					$('#_cep').focus();
				},
				complete: function() {
					$('#_gif-loading').css('display', 'none');
				}
			});
		}
	});

	/*
	|--------------------------------------------------------------------------
	| Preenche nome, telefone e email do cliente conforme os dados da oportunidade
	|--------------------------------------------------------------------------
	*/
	$('#oportunidade_id').change(function(){

		var id = $('#oportunidade_id').val();

		if (id != '') {

			$.ajax({
				url: '/home/oportunidade/' + id,
				type: 'GET',
				dataType: 'json',
				success: function(json) {
					$('#email').val(json.email)
					$('#contato').val(json.telefone);
					$('#nome').val(json.nome);
				},
				error: function() {
					console.log('Erro na requisição ajax');
				}
			});
		}
	});

	/*
	|--------------------------------------------------------------------------
	| Máscaras
	|--------------------------------------------------------------------------
	*/
	$('#cpf').mask('00000000000');

	$('#cep, #_cep').mask('00000-000', {clearIfNotMatch: true});

	$('#contato, #telefone').mask('(00) Z0000-0000', {
				translation: {
					'Z': {
					pattern: /[9]/, optional: true
					}
				},
				clearIfNotMatch: true
	});

	$('#data_nascimento, #data_emissao, #data_agendamento').mask('AY/BY/YYYY', {clearIfNotMatch: true,
															'translation': {
																A: {pattern: /[0-3]/},
																B: {pattern: /[0-1]/},
																Y: {pattern: /[0-9]/}
															 }
															});

	/*
	|--------------------------------------------------------------------------
	| Script que copia os valores do endereco correspondência para o endereco
	| de cobrañca se o checkbox for marcado, caso contrário, limpa os valores
	|--------------------------------------------------------------------------
	*/
	$('#endereco_cobranca').click(function(){
		if (document.getElementById('endereco_cobranca').checked) {
			$('#_cep').prop('value', $('#cep').val());
			$('#_logradouro').prop('value', $('#logradouro').val());
			$('#_numero').prop('value', $('#numero').val());
			$('#_referencia').prop('value', $('#referencia').val());
			$('#_bairro').prop('value', $('#bairro').val());
			$('#_cidade').prop('value', $('#cidade').val());
			$('#_estado').prop('value', $('#estado').val());
		} else {
			$('#_cep').prop('value', '');
			$('#_logradouro').prop('value', '');
			$('#_numero').prop('value', '');
			$('#_referencia').prop('value', '');
			$('#_bairro').prop('value', '');
			$('#_cidade').prop('value', '');
			$('#_estado').prop('value', '');
		}
	});

	/*
	|--------------------------------------------------------------------------
	| Preenche o endereço de cobrança de acordo com o endereco de correspondência
	|--------------------------------------------------------------------------
	*/
	$('#cep, #logradouro, #numero, #referencia, #bairro, #cidade, #estado').keyup(function(event){
		if (document.getElementById('endereco_cobranca').checked) {
			$('#_cep').prop('value', $('#cep').val());
			$('#_logradouro').prop('value', $('#logradouro').val());
			$('#_numero').prop('value', $('#numero').val());
			$('#_referencia').prop('value', $('#referencia').val());
			$('#_bairro').prop('value', $('#bairro').val());
			$('#_cidade').prop('value', $('#cidade').val());
			$('#_estado').prop('value', $('#estado').val());
		} else {
			event.preventDefault();
		}
	});


})