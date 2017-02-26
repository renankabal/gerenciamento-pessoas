<?php

class EnderecoCorrespondenciaTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
                #Apaga e povoa a tabela de dependentes
                DB::table('enderecos_correspondencias')->delete();
                EnderecoCorrespondencia::create([
                        'cep' 		    => '68900-030',
                        'logradouro' 	    => 'Rua Padre Júlio Mº Lombaerd',
                        'numero' 	    => '1500',
                        'bairro'	    => 'Centro',
                        'cidade' 	    => 'Macapá',
                        'estado' 	    => 'AP',
                        'cliente_id'        => 1
                ]);

                EnderecoCorrespondencia::create([
                        'cep'               => '68905-741',
                        'logradouro'        => 'Rua Turívio Oriosvaldo Guimarães',
                        'numero'            => '1896',
                        'bairro'            => 'Perpétuo Socorro',
                        'cidade'            => 'Macapá',
                        'estado'            => 'AP',
                        'cliente_id'        => 2,
                ]);
	}

}