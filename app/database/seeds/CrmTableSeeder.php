<?php

class CrmTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
                
        #Apaga e povoa a tabela de tipos de crm
        DB::table('crms_tipos')->delete();
        CrmTipo::create(array('nome' => 'Telefone'));
        CrmTipo::create(array('nome' => 'E-Mail'));
        CrmTipo::create(array('nome' => 'Visita'));
        CrmTipo::create(array('nome' => 'Sms'));

        #Apaga e povoa a tabela de status do crm
        DB::table('crms_status')->delete();
        CrmStatus::create(array('nome' => 'AGUARDANDO'));
        CrmStatus::create(array('nome' => 'CONCLUIDO'));

	}

}