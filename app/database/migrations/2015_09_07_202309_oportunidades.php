<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Oportunidades extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oportunidades', function($table)
        {
            $table->increments('id');
            $table->string('nome', 150);
            $table->string('telefone')->nullable();
            $table->string('email', 150)->nullable();
            $table->integer('oportunidade_status_id')->unsigned();
			$table->foreign('oportunidade_status_id')->references('id')->on('oportunidades_status');
            $table->integer('oportunidade_empresa_id')->unsigned();
			$table->foreign('oportunidade_empresa_id')->references('id')->on('oportunidades_empresas');
            $table->integer('usuario_id')->unsigned();
			$table->foreign('usuario_id')->references('id')->on('usuarios');
			$table->string('possui_crm', 1)->default('s');
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
		Schema::drop('oportunidades');
	}

}
