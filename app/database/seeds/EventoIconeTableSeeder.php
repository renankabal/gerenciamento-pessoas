<?php

class EventoIconeTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Apaga e povoa a tabela de eventos_icones
        DB::table('eventos_icones')->delete();
        
        EventoIcone::create(['nome'  => 'fa-info']);
        EventoIcone::create(['nome'  => 'fa-warning']);
        EventoIcone::create(['nome'  => 'fa-check']);
        EventoIcone::create(['nome'  => 'fa-user']);
        EventoIcone::create(['nome'  => 'fa fa-lock']);
        EventoIcone::create(['nome'  => 'fa-clock-o']);
        EventoIcone::create(['nome'  => 'fa-birthday-cake']);
        // EventoIcone::create(['nome'  => 'xxxx']);
        // EventoIcone::create(['nome'  => 'xxxx']);
        // EventoIcone::create(['nome'  => 'xxxx']);
        // EventoIcone::create(['nome'  => 'xxxx']);
        // EventoIcone::create(['nome'  => 'xxxx']);
    }

}