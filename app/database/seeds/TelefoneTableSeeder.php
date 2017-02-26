<?php

class TelefoneTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
                #Apaga e povoa a tabela de dependentes
                DB::table('telefones')->delete();
                Telefone::create([
                        'contato'               => '(96) 99125-5874',                        
                        'cliente_id' 		=> 1,
                        'telefone_tipo_id'      => 2
                ]);

                Telefone::create([
                        'contato'               => '(96) 98142-9613',                        
                        'cliente_id'            => 2,
                        'telefone_tipo_id'      => 1
                ]);
	}

}