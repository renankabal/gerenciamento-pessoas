<?php

class Plano extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'planos';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'nome',
		'descricao',
		'valor'
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
	public function cobranca()
	{
		return $this->belongsTo('Cobranca');
	}

}