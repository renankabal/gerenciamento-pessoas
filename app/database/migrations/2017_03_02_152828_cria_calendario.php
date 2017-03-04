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
		Schema::create('eventos', function($table)
        {
            $table->increments('id');
            $table->string('nome', 255);
            $table->text('descricao')->nullable();
            $table->date('data_evento');
            $table->boolean('anual')->default(false);
            $table->timestamps();
        });

        Schema::create('eventos_icones', function($table)
        {
            $table->increments('id');
            $table->string('nome', 50);
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
		Schema::drop('eventos_icones');
        Schema::drop('eventos');
	}

}
