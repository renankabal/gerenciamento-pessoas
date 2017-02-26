<?php

class Dependente extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'dependentes';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'nome',
		'cpf',
		'data_nascimento',
		'telefone',
		'profissao',
		'ocupacao',
		'cliente_id',
		'dependente_tipo_id'
		];

	/*
	 *
	 * regras de validação
	 * 
	*/
	public static $rules = [
		'nome' 					=> 'required|max:150',
		'cpf' 					=> 'required|min:11|max:11|unique:dependentes,cpf',
		'data_nascimento'		=> 'required|max:10',
		'profissao'				=> 'max:150',
		'ocupacao'				=> 'max:150',
		'cliente_id'			=> 'required',
		'dependente_tipo_id'	=> 'required'
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

	public function dependenteTipo()
	{
		return $this->belongsTo('DependenteTipo');
	}

}