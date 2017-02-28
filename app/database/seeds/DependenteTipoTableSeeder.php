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
        DependenteTipo::create(array('nome' => 'Tio(a)'));
        DependenteTipo::create(array('nome' => 'Irmão(ã)'));
        DependenteTipo::create(array('nome' => 'Avô'));
        DependenteTipo::create(array('nome' => 'Avó'));
        DependenteTipo::create(array('nome' => 'Primo(a)'));
        DependenteTipo::create(array('nome' => 'Sobrinho(a)'));
        DependenteTipo::create(array('nome' => 'Sogro(a)'));
        DependenteTipo::create(array('nome' => 'Genro(a)'));
        DependenteTipo::create(array('nome' => 'Neto(a)'));
        DependenteTipo::create(array('nome' => 'Cunhado(a)'));
	}

}