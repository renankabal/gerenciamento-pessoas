<?php

class DependenteTipoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de tipos de dependentes
        DB::table('dependentes_tipos')->delete();
        DependenteTipo::create(array('nome' => 'Cônjuge'));
        DependenteTipo::create(array('nome' => 'Filho(a)'));
        DependenteTipo::create(array('nome' => 'Pai'));
        DependenteTipo::create(array('nome' => 'Mãe'));
        DependenteTipo::create(array('nome' => 'Dependente'));
	}

}