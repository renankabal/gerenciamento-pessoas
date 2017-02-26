<?php

class PlanoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de planos
        DB::table('planos')->delete();
        Plano::create(array('nome' => 'ew', 'descricao' => 'COMERCIAL', 'valor' => '12'));
        Plano::create(array('nome' => 'eqwewq', 'descricao' => 'CELULAR', 'valor' => '12'));
	}

}