<?php

class Cobranca extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'cobrancas';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'endereco_cobranca',
		'data_cobranca',
		'cliente_id',
		'zona_id',
		'plano_id'
	];

	/*
	 *
	 * regras de validação
	 * 
	*/
	public static $rules = [];

	/*
	 *
	 * relacionamento do Eloquent ORM
	 * 
	*/
	public function cliente()
	{
		return $this->hasOne('Cliente');
	}

	public function zona()
	{
		return $this->hasOne('Zona');
	}

	public function plano()
	{
		return $this->hasOne('Plano');
	}

}