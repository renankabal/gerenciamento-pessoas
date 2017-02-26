<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EnderecosCorrespondenciaCobranca extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enderecos_correspondencias', function($table)
        {
            $table->increments('id');
            $table->string('cep', 9);
            $table->string('logradouro', 150);
            $table->string('numero', 150);
            $table->string('referencia')->nullable();
            $table->string('bairro', 200);
            $table->string('cidade', 200);
            $table->string('estado', 2);
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
		Schema::drop('enderecos_correspondencias');
	}

}
