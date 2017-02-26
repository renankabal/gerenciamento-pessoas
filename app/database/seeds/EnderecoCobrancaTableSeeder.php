<?php

class EnderecoCobrancaTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
                #Apaga e povoa a tabela de dependentes
                DB::table('enderecos_cobrancas')->delete();
                EnderecoCobranca::create([
                        '_cep' 		    => '68900-030',
                        '_logradouro' 	    => 'Rua Padre Júlio Mº Lombaerd',
                        '_numero' 	    => '1500',
                        '_bairro'	    => 'Centro',
                        '_cidade' 	    => 'Macapá',
                        '_estado' 	    => 'AP',
                        'cliente_id'        => 1
                ]);

                EnderecoCobranca::create([
                        '_cep'               => '68905-741',
                        '_logradouro'        => 'Rua Turívio Oriosvaldo Guimarães',
                        '_numero'            => '1896',
                        '_bairro'            => 'Perpétuo Socorro',
                        '_cidade'            => 'Macapá',
                        '_estado'            => 'AP',
                        'cliente_id'        => 2,
                ]);
	}

}