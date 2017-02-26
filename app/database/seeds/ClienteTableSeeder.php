<?php

class ClienteTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de clientes
        DB::table('clientes')->delete();
        #Ao salvar uma oportunidade como cliente altera o status para nao exibir na lista de oportunidades novamente
        Oportunidade::find(1)->update(['oportunidade_status_id' => 2]);
        Cliente::create(['oportunidade_id' 	=> 1,
						 'nome'				=> 'ROSIMERE DA SILVA',
						 'email'			=> 'rosimere@gmail.com',
						 'cpf' 				=> '85296374125',
						 'rg' 				=> '741963',
						 'orgao_expedidor' 	=> 'SSP',
						 'data_emissao' 	=> '2012/05/05',
						 'data_nascimento' 	=> '1960/06/08',
						 'sexo' 			=> 'M',
						 'profissao' 		=> 'Administrador',
						 'email' 			=> 'cruzfsson@cruzfsson.com',
						 'estado_civil' 	=> 'Solteiro'
	 	]);
        #Ao salvar uma oportunidade como cliente altera o status para nao exibir na lista de oportunidades novamente
        Oportunidade::find(2)->update(['oportunidade_status_id' => 2]);
		Cliente::create(['oportunidade_id' 	=> 2,
						 'nome'				=> 'MARIETA SEVERO',
						 'email'			=> 'marieta@gmail.com',
						 'cpf' 				=> '96787413951',
						 'rg' 				=> '951863',
						 'orgao_expedidor' 	=> 'PTC',
						 'data_emissao' 	=> '2012/05/05',
						 'data_nascimento' 	=> '1988/09/11',
						 'sexo' 			=> 'M',
						 'profissao' 		=> 'Gerente de Marketing',
						 'email' 			=> 'himtexugo@texugo.com',
						 'estado_civil' 	=> 'Casado'
		]);
	}

}