<?php

class OportunidadeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de status
        DB::table('oportunidades_status')->delete();
        OportunidadeStatus::create(array('nome' => 'EM ABERTO'));
        OportunidadeStatus::create(array('nome' => 'FINALIZADO'));
        OportunidadeStatus::create(array('nome' => 'CANCELADO'));

        #Apaga e povoa a tabela de empresas
        DB::table('oportunidades_empresas')->delete();
        OportunidadeEmpresa::create(array('nome' => 'FÊNIX LIFE'));
        OportunidadeEmpresa::create(array('nome' => 'QUALIT CONSULTORIA'));
	}

}