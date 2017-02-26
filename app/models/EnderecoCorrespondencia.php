<?php

class EnderecoCorrespondencia extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'enderecos_correspondencias';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'cep',
		'logradouro',
		'numero',
		'referencia',
		'bairro',
		'cidade',
		'estado',
	];

	/*
	 *
	 * regras de validação
	 *
	*/
	public static $rules = [
		'endereco_cobranca'	=> 'boolean',
		'cep' 		 => 'required|min:9|max:9',
		'logradouro' => 'required',
		'numero' 	 => 'required',
		'bairro' 	 => 'required',
		'cidade' 	 => 'required',
		'estado' 	 => 'required|max:2'
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