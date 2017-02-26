<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cobrancas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cobrancas', function($table)
        {
            $table->increments('id');
            $table->string('endereco_cobranca');
            $table->date('data_cobranca');
            $table->integer('cliente_id')->unsigned();
			$table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('zona_id')->unsigned();
			$table->foreign('zona_id')->references('id')->on('zonas');
            $table->integer('plano_id')->unsigned();
			$table->foreign('plano_id')->references('id')->on('planos');
            $table->string('status', 100);
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
		Schema::drop('cobrancas');
	}

}
