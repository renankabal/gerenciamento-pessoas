<?php

class EventosTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Apaga e povoa a tabela de eventos
        DB::table('eventos')->delete();
        Evento::create(['nome' => 'Dia do Filatelista Brasileiro', 'data_evento' => '2017-03-05']);
        Evento::create(['nome' => 'Dia Mundial do Consumidor', 'data_evento' => '2017-03-15']);
        Evento::create(['nome' => 'Dia de São José', 'data_evento' => '2017-03-19']);
        Evento::create(['nome' => 'Dia Mundial da Terra', 'data_evento' => '2017-03-21']);
    }

}