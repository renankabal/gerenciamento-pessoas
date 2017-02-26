<?php

class TelefoneTipoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de tipos de telefone
        DB::table('telefones_tipos')->delete();
        TelefoneTipo::create(array('nome' => 'COMERCIAL'));
        TelefoneTipo::create(array('nome' => 'CELULAR'));
	}

}