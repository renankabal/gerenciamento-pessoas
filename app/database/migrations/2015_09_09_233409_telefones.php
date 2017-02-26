<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Telefones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('telefones', function($table)
        {
            $table->increments('id');
            $table->string('contato', 150);
            $table->integer('cliente_id')->unsigned();
			$table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('telefone_tipo_id')->unsigned();
			$table->foreign('telefone_tipo_id')->references('id')->on('telefones_tipos');
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
		Schema::drop('telefones');
	}

}
