<?php

class Zona extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'zonas';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'nome',
		'identificacao'
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