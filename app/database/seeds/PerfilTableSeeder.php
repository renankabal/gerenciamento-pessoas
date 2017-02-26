<?php

class PerfilTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de perfis
        DB::table('perfis')->delete();
        Perfil::create(array('nome' => 'ADMINISTRADOR'));
        Perfil::create(array('nome' => 'OPERADOR'));
	}

}