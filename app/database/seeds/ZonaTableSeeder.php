<?php

class ZonaTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        #Apaga e povoa a tabela de zonas
        DB::table('zonas')->delete();
        Zona::create(array('identificacao' => 1));
        Zona::create(array('identificacao' => 2));
        Zona::create(array('identificacao' => 3));
        Zona::create(array('identificacao' => 4));
        Zona::create(array('identificacao' => 5));
        Zona::create(array('identificacao' => 6));
        Zona::create(array('identificacao' => 7));
	}

}