<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perfis', function($table)
        {
            $table->increments('id');
            $table->string('nome', 150)->unique();
            $table->timestamps();
        });

		Schema::create('usuarios', function($table)
        {
            $table->increments('id');
            $table->string('foto')->nullable();
            $table->string('email', 255)->unique();
            $table->string('senha', 60);
            $table->string('nome', 255);
            $table->integer('perfil_id')->unsigned();
			$table->foreign('perfil_id')->references('id')->on('perfis');
            $table->string('remember_token', 100)->nullable();
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
		Schema::drop('usuarios');
		Schema::drop('perfis');
	}

}
