<?php

class Evento extends Eloquent {

    /**
     * Tabela usada pela model no banco
     *
     * @var string
     */
    protected $table = 'eventos';

    /*
     *
     * variável fillable é usada para atribuição em massa
     * http://laravel.com/docs/4.2/eloquent#mass-assignment
    */
    protected $fillable = [
        'nome',
        'descricao',
        'data_evento',
        'evento_icone_id',
        'anual'
    ];

    /*
     *
     * regras de validação
     * 
    */
    public static $rules = [
        'nome'           => 'required',
        'data_evento'    => 'required'
    ];
    /*
     *
     * relacionamento do Eloquent ORM
     * 
    */
    public function eventoIcone()
    {
        return $this->belongsTo('EventoIcone');
    }
}