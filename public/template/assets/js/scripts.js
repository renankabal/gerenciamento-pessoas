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
				url :"https://viacep.com.br/ws/" + cep +"/json",
				type: 'GET',
				dataType: 'json',
				beforeSend: function(){ $('#gif-loading').css('display', 'inline')},
				success: function(json) {
					console.log(json);
					$('#gif-loading').css('display', 'none');
					$('#logradouro').val(json.logradouro.toUpperCase());
					$('#bairro').val(json.bairro.toUpperCase());
					$('#cidade').val(json.localidade.toUpperCase());
					$('#estado').val(json.uf.toUpperCase());

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

	/*
	|--------------------------------------------------------------------------
	| Máscaras
	|--------------------------------------------------------------------------
	*/
	$('.cpf').mask('00000000000');

	$('.monetario').mask('000.000.000.000.000,00', {reverse: true});

	$('#cep, #_cep').mask('00000-000', {clearIfNotMatch: true});

	$('#contato, #telefone').mask('(00) Z0000-0000', {
		translation: {
			'Z': {
			pattern: /[9]/, optional: true
			}
		},
		clearIfNotMatch: true
	});

	$('#data_nascimento, #data_emissao, #data_agendamento, .data').mask('AY/BY/YYYY', {
		clearIfNotMatch: true,
			'translation': {
				A: {pattern: /[0-3]/},
				B: {pattern: /[0-1]/},
				Y: {pattern: /[0-9]/}
			 }
	});

	$('.hora').mask('00:00');

	$('.uppercase').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });

    $('.lowercase').keyup(function(){
        $(this).val($(this).val().toLowerCase());
    });
})