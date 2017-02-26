<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Crms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crms', function($table)
        {
            $table->increments('id');
            $table->timestamp('data_agendamento');
            $table->text('conteudo');
            $table->integer('crm_tipo_id')->unsigned();
			$table->foreign('crm_tipo_id')->references('id')->on('crms_tipos');
			$table->integer('crm_status_id')->unsigned();
			$table->foreign('crm_status_id')->references('id')->on('crms_status');
            $table->integer('oportunidade_id')->unsigned();
			$table->foreign('oportunidade_id')->references('id')->on('oportunidades');
            $table->integer('usuario_id')->unsigned();
			$table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->timestamp('data_cadastro');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crms');
	}

}
