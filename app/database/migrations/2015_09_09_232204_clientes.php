<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function($table)
		{
			$table->increments('id');
			$table->string('nome', 150);			
			$table->string('foto')->nullable();
			$table->string('cpf', 11)->unique();
			$table->string('rg')->unique()->nullable();
			$table->string('orgao_expedidor', 150)->nullable();
			$table->date('data_emissao')->nullable();
			$table->date('data_nascimento');
			$table->string('sexo', 1);
			$table->string('profissao', 150)->nullable();
			$table->string('email', 150)->nullable();
			$table->string('estado_civil', 150);
			$table->boolean('ativo')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clientes');
	}

}
