<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaCalendario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('eventos_icones', function($table)
        {
            $table->increments('id');
            $table->string('nome', 50);
            $table->timestamps();
        });

        Schema::create('eventos', function($table)
        {
            $table->increments('id');
            $table->string('nome', 255);
            $table->text('descricao')->nullable();
            $table->date('data_evento');
            $table->time('hora_evento')->nullable();
            $table->boolean('anual')->default(false);
            $table->integer('evento_icone_id')->unsigned()->default(1);
            $table->foreign('evento_icone_id')->references('id')->on('eventos_icones');
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
        Schema::drop('eventos');
        Schema::drop('eventos_icones');
	}

}
