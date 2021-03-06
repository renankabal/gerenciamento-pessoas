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

        Cliente::create(['nome'				=> 'ROSIMERE DA SILVA',
        				 'matricula'        => 12345678,
						 'email'			=> 'rosimere@gmail.com',
						 'cpf' 				=> '85296374125',
						 'rg' 				=> '741963',
						 'orgao_expedidor' 	=> 'SSP',
						 'data_emissao' 	=> '2012/05/05',
						 'data_nascimento' 	=> '1960/06/08',
						 'sexo' 			=> 'F',
						 'profissao' 		=> 'Administrador',
						 'email' 			=> 'cruzfsson@cruzfsson.com',
						 'estado_civil' 	=> 'Solteiro'
	 	]);

		Cliente::create(['nome'				=> 'MARIETA SEVERO',
        				 'matricula'        => 87654321,
						 'email'			=> 'marieta@gmail.com',
						 'cpf' 				=> '96787413951',
						 'rg' 				=> '951863',
						 'orgao_expedidor' 	=> 'PTC',
						 'data_emissao' 	=> '2012/05/05',
						 'data_nascimento' 	=> '1988/09/11',
						 'sexo' 			=> 'F',
						 'profissao' 		=> 'Gerente de Marketing',
						 'email' 			=> 'himtexugo@texugo.com',
						 'estado_civil' 	=> 'Casado'
		]);
	}

}