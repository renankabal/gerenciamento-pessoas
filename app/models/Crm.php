<?php

class Crm extends Eloquent {

	/**
	 * Tabela usada pela model no banco
	 *
	 * @var string
	 */
	protected $table = 'crms';

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
		'oportunidade_id',
		'crm_tipo_id',
		'crm_status_id',
		'conteudo',
		'data_agendamento',
		'usuario_id'
	];

	/*
	 *
	 * regras de validação
	 *
	*/
	public static $rules = [
		'cliente_id'		=>	'required',
		'crm_tipo_id'		=>	'required',
		'conteudo'			=> 'required',		
		'data_agendamento'	=>	'required',
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

}