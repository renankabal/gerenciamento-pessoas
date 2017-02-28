<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dependentes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dependentes', function($table)
        {
            $table->increments('id');
            $table->string('nome', 150);
            $table->string('cpf')->unique();
            $table->date('data_nascimento');
            $table->string('telefone');
            $table->string('profissao', 150)->nullable();
            $table->string('ocupacao', 150)->nullable();            
            $table->integer('cliente_id')->unsigned();
			$table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('dependente_tipo_id')->unsigned();
			$table->foreign('dependente_tipo_id')->references('id')->on('dependentes_tipos');
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
		Schema::drop('dependentes');
	}

}
