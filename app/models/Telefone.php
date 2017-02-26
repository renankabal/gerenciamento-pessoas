<?php

class Telefone extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'telefones';

	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'contato',
		'telefone_tipo_id'
	];

	/*
	 *
	 * regras de validação
	 * 
	*/
	public static $rules = [
		'contato' 			=> 'required',
		'telefone_tipo_id' 	=> 'required'
	];

	/*
	 *
	 * relacionamento do Eloquent ORM
	 * 
	*/
	public function telefoneTipo()
	{
		return $this->belongsTo('TelefoneTipo');
	}

	public function cliente()
	{
		return $this->belongsTo('Cliente');
	}

}