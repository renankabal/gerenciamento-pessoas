<?php

class EnderecoCobranca extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'enderecos_cobrancas';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'_cep',
		'_logradouro',
		'_numero',
		'_referencia',
		'_bairro',
		'_cidade',
		'_estado'
	];

	/*
	 *
	 * regras de validação
	 *
	*/
	public static $rules = [
		'_cep' 		 => 'required|min:9|max:9',
		'_logradouro' => 'required',
		'_numero' 	 => 'required',
		'_bairro' 	 => 'required',
		'_cidade' 	 => 'required',
		'_estado' 	 => 'required|max:2'
	];

	/*
	 *
	 * relacionamento do Eloquent ORM
	 *
	*/

	public function cliente()
	{
		return $this->belongsTo('Cliente');
	}

}