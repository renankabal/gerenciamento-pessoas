<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaFinanceiro extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('debitos', function($table)
		{
			$table->increments('id');
			$table->string('nome', 255);
			$table->string('descricao', 255)->nullable();
			$table->string('observacao', 255)->nullable();
			$table->date('data_debito');
			$table->float('valor_debito')->unsigned();
			$table->integer('quantidade_parcelas')->unsigned();
			$table->boolean('debito_finalizado')->default('f');
			$table->integer('cliente_id')->unsigned();
			$table->foreign('cliente_id')->references('id')->on('clientes');
			$table->integer('ano');
			$table->timestamps();
		});

		Schema::create('parcelas', function($table)
		{
			$table->increments('id');
			$table->integer('debito_id')->unsigned();
			$table->foreign('debito_id')->references('id')->on('debitos');
			$table->integer('parcela')->unsigned();
			$table->integer('total_parcelas')->unsigned();
			$table->float('valor_parcela')->unsigned();
			$table->date('data_vencimento');
			$table->float('valor_pago')->unsigned()->nullable();
			$table->date('data_pagamento')->nullable();
			$table->text('observacao')->nullable();
			$table->boolean('parcela_finalizada')->default('f');
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
		Schema::drop('parcelas');
		Schema::drop('debitos');
	}

}
