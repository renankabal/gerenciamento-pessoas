<?php

class Cliente extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'clientes';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'nome',
		'cpf',
		'rg',
		'orgao_expedidor',
		'data_emissao',
		'data_nascimento',
		'sexo',
		'email',
		'profissao',
		'estado_civil'
		];

	/*
	 *
	 * regras de validação
	 *
	*/
	public static $rules = [
		'nome'				=> 'required',
		'cpf' 				=> 'required|min:11|max:11|unique:clientes,cpf',
		'rg'				=> 'required|unique:clientes,rg',
		'orgao_expedidor' 	=> 'required',
		'data_emissao' 		=> 'required|date_format:d/m/Y',
		'data_nascimento' 	=> 'required|date_format:d/m/Y',
		'sexo' 				=> 'required',
		'email'				=> 'unique:clientes,email',
		'estado_civil'		=> 'required'
	];

	/*
	 *
	 * relacionamento do Eloquent ORM
	 *
	*/

	public function plano()
	{
		return $this->hasOne('Plano');
	}

	public function zona()
	{
		return $this->hasOne('Zona');
	}

	public function cobrancas()
	{
		return $this->hasMany('Cobranca');
	}

	public function enderecoCorrespondencia()
	{
		return $this->hasOne('EnderecoCorrespondencia');
	}

	public function enderecoCobranca()
	{
		return $this->hasOne('enderecoCobranca');
	}

	public function telefone()
	{
		return $this->hasOne('Telefone');
	}

	public function dependentes()
	{
		return $this->hasMany('Dependente');
	}

}