<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';
	
	/*
	 *
	 * variável fillable é usada para atribuição em massa
	 * http://laravel.com/docs/4.2/eloquent#mass-assignment
	*/
	protected $fillable = [
		'nome',
		'foto',
		'email',
		'senha',
		'perfil_id'
		];

	/*
	 *
	 * regras de validação
	 *
	*/
	public static $rules = [
		'nome' => 'required',
		'email' => 'required',
		'senha' => 'required',
		'perfil_id' => 'required'
	];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('senha', 'remember_token');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
 
	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->senha;
	}
 
	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
        
	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
    public function getRememberToken()
    {
        return $this->remember_token;
    }
 
	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
 
	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }


	public function perfil()
	{
		return $this->hasOne('Perfil');
	}
}
