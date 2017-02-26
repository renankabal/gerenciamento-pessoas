<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PerfilTableSeeder');
		$this->call('UsuarioTableSeeder');
		$this->call('OportunidadeTableSeeder');
		// Esta seed deve ser retirado no sistema de produção
		$this->call('PovoamentoTableSeeder');
		// Fim do seed de povoamento local
		$this->call('PlanoTableSeeder');
		$this->call('DependenteTipoTableSeeder');
		$this->call('ZonaTableSeeder');
		$this->call('ClienteTableSeeder');
		$this->call('TelefoneTipoTableSeeder');
		$this->call('TelefoneTableSeeder');
		$this->call('EnderecoCorrespondenciaTableSeeder');
		$this->call('EnderecoCobrancaTableSeeder');
		$this->call('DependenteTableSeeder');
		$this->call('CrmTableSeeder');
		$this->command->info('
		**********************************************
		*            Banco criado e povoado!  	     *
		**********************************************
		');
	}

}
