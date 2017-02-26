<?php

class Oportunidade extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'oportunidades';

	/**
	 * Cancela o timestamps da tabela
	 *
	 * @var boolean
	 */
	public $timestamps = false;
	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	

	protected $fillable = [
		'nome',
		'telefone',
		'email',
		'oportunidade_empresa_id',
		'oportunidade_status_id'
		];

	/*
	 *
	 * regras de validação
	 *
	*/
	public static $rules = [
		'nome'		=>	'required',
		'telefone'	=>	'required',
		'oportunidade_empresa_id'	=> 'required'
	];

	/*
	 *
	 * relacionamento do Eloquent ORM
	 * 
	*/
	public function cliente()
	{
		return $this->hasOne('Cliente');
	}

	public function oportunidadeEmpresa()
	{
		return $this->belongsTo('OportunidadeEmpresa');
	}

}