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
        Evento::create(['nome' => 'Ano novo', 'data_evento' => '2017-01-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Mundial da Paz', 'data_evento' => '2017-01-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Publicitário', 'data_evento' => '2017-02-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Nossa Senhora dos Navegantes', 'data_evento' => '2017-02-02', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Promulgação da primeira Constituição da República do Brasil', 'data_evento' => '2017-02-24', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Internacional da Mulher', 'data_evento' => '2017-03-08', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Início do Outono', 'data_evento' => '2017-03-20', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Mentira', 'data_evento' => '2017-04-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Abolição da Escravidão dos Índios', 'data_evento' => '2017-04-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Mundial de Conscientização do Autismo', 'data_evento' => '2017-04-02', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Internacional do Livro Infantil', 'data_evento' => '2017-04-02', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Mundial da Saúde', 'data_evento' => '2017-04-07', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Mundial de Combate Ao Câncer', 'data_evento' => '2017-04-08', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Mundial da Astronomia', 'data_evento' => '2017-04-08', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Nacional do Livro Infantil', 'data_evento' => '2017-04-18', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Índio', 'data_evento' => '2017-04-19', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de Tiradentes (Inconfidência Mineira)', 'data_evento' => '2017-04-21', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Inauguração de Brasília', 'data_evento' => '2017-04-21', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Descobrimento do Brasil', 'data_evento' => '2017-04-22', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de São Jorge', 'data_evento' => '2017-04-23', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Mundial do Livro', 'data_evento' => '2017-04-23', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Educação', 'data_evento' => '2017-04-28', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Nacional da Mulher', 'data_evento' => '2017-04-30', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Mundial do Trabalho', 'data_evento' => '2017-05-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Artista Plástico Brasileiro', 'data_evento' => '2017-05-08', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Abolição da Escravatura', 'data_evento' => '2017-05-13', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de Nossa Senhora de Fátima', 'data_evento' => '2017-05-13', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Marinha Brasileira', 'data_evento' => '2017-06-11', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia dos Namorados', 'data_evento' => '2017-06-12', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de Santo Antônio', 'data_evento' => '2017-06-13', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Químico', 'data_evento' => '2017-06-18', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Cinema Brasileiro', 'data_evento' => '2017-06-19', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Início do Inverno', 'data_evento' => '2017-06-21', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia Olímpico', 'data_evento' => '2017-06-23', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de São João', 'data_evento' => '2017-06-24', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de São Pedro', 'data_evento' => '2017-06-29', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia mundial do rock', 'data_evento' => '2017-07-13', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Amigo', 'data_evento' => '2017-07-20', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Estudante', 'data_evento' => '2017-08-11', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Folclore', 'data_evento' => '2017-08-22', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Soldado', 'data_evento' => '2017-08-25', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Profissional de Educação Física', 'data_evento' => '2017-09-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Proclamação da Independência do Brasil', 'data_evento' => '2017-09-07', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Árvore', 'data_evento' => '2017-09-21', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Início da Primavera', 'data_evento' => '2017-09-22', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia das Crianças', 'data_evento' => '2017-10-12', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Descobrimento da América', 'data_evento' => '2017-10-12', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia do Professor', 'data_evento' => '2017-10-15', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de Todos os Santos', 'data_evento' => '2017-11-01', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia de Finados', 'data_evento' => '2017-11-02', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Proclamação da República', 'data_evento' => '2017-11-15', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Bandeira Nacional', 'data_evento' => '2017-11-19', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Dia da Consciência Negra', 'data_evento' => '2017-10-20', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Início do Verão', 'data_evento' => '2017-12-21', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Natal', 'data_evento' => '2017-12-25', 'anual' => 'true', 'evento_icone_id' => 8]);
        Evento::create(['nome' => 'Réveillon', 'data_evento' => '2017-12-31', 'anual' => 'true', 'evento_icone_id' => 8]);
    }

}