<?php

class DependenteTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
                #Apaga e povoa a tabela de dependentes
                DB::table('dependentes')->delete();
                Dependente::create([
                        'nome' 		        => 'Falidora Da Fortuna Dopai Ramiro',
                        'cpf' 			=> '85296374129',
                        'data_nascimento' 	=> '2000-09-05',
                        'telefone'		=> '999999999',
                        'profissao' 		=> 'Vendedor',
                        'cliente_id' 		=> 1,
                        'dependente_tipo_id'    => 2
                ]);

                Dependente::create([
                        'nome' 			=> 'Jean Claude Van Dame Da Silva',
                        'cpf' 			=> '85299644129',
                        'data_nascimento' 	=> '1992-05-10',
                        'telefone' 		=> '999999999',
                        'profissao' 		=> 'Caixa',
                        'cliente_id' 		=> 2,
                        'dependente_tipo_id'    => 3

                ]);
	}

}