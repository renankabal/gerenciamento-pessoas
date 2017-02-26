<?php

class TelefoneTipo extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'telefones_tipos';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'nome'
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
	public function telefone()
	{
		return $this->belongsTo('Telefone');
	}

}