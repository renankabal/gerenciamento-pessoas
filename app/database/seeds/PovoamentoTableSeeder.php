<?php

class PovoamentoTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de oportunidades
        DB::table('oportunidades')->delete();
        Oportunidade::create(array('nome' => 'HARRY POTTER', 'telefone' => '93019301931', 'email' => 'harry@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'DANIEL ALMEIDA', 'telefone' => '321312332', 'email' => 'daniel@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 2, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'INGRID ESTEFFANY', 'telefone' => '4029449042', 'email' => 'ingrid@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'VIVIANE ARAUJO', 'telefone' => '13123122', 'email' => 'viviane@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));   
        Oportunidade::create(array('nome' => 'ROSIMERE DA SILVA', 'telefone' => '99999999', 'email' => 'rosimere@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'MARIETA SEVERO', 'telefone' => '43424234', 'email' => 'marieta@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'ANTONIO MELO', 'telefone' => '222222', 'email' => 'antonio@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'GEOVANA DA COSTA', 'telefone' => '3131232', 'email' => 'geovana@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'ANA MARIA BRAGA', 'telefone' => '32312', 'email' => 'anamaria@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'CASSIANO BRAGA FARIAS', 'telefone' => '33123', 'email' => 'cassiano@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'LUCIANO DANTAS ALMEIDA', 'telefone' => '3432423', 'email' => 'luciano@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 2, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'JESUS AMADO', 'telefone' => '4423423', 'email' => 'jesus@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'ROBERTO CARLOS', 'telefone' => '665465', 'email' => 'roberto@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 1, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'ROBERTA MIRANDA', 'telefone' => '9480348923', 'email' => 'roberta@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 2, 'usuario_id' => 2, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'VALESCA POPOZUDA', 'telefone' => '55455353', 'email' => 'popozuda@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 2, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'FELIPE ALMEIDA AMORAS', 'telefone' => '434342312', 'email' => 'felipe@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 2, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
        Oportunidade::create(array('nome' => 'GEORGINA DA SILVA REGO', 'telefone' => '931209381', 'email' => 'georgina@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 1, 'usuario_id' => 2, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));
	Oportunidade::create(array('nome' => 'CLEONYCE DE MELO', 'telefone' => '434342312', 'email' => 'cleonice@gmail.com', 'oportunidade_status_id' => 1, 'oportunidade_empresa_id' => 2, 'usuario_id' => 2, 'data_cadastro' => '2015-09-22', 'possui_crm' => 's'));

        }

}