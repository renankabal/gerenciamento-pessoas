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
		// Fim do seed de povoamento local
		$this->call('DependenteTipoTableSeeder');
		$this->call('ClienteTableSeeder');
		$this->call('TelefoneTipoTableSeeder');
		$this->call('TelefoneTableSeeder');
		$this->call('EnderecoCorrespondenciaTableSeeder');
		$this->call('DependenteTableSeeder');
		$this->command->info('
		**********************************************
		*       Banco do SIGEP criado e povoado!  	 *
		**********************************************
		');
	}

}
