<?php

class Debito extends Eloquent {

    /**
     * Tabela usada pela model no banco
     *
     * @var string
     */
    protected $table = 'debitos';

    /*
     *
     * variável fillable é usada para atribuição em massa
     * http://laravel.com/docs/4.2/eloquent#mass-assignment
    */
    protected $fillable = [
        'nome',
        'descricao',
        'observacao',
        'data_debito',
        'valor_debito',
        'quantidade_parcelas',
        'debito_finalizado',
        'cliente_id'
        ];

    /*
     *
     * regras de validação
     *
    */
    public static $rules = [
        'nome'               => 'required',
        'data_debito'        => 'required|date_format:d/m/Y',
        'valor_debito'       => 'required',
        'quantidade_parcelas'=> 'required',
        'cliente_id'         => 'required'
    ];

    /*
     *
     * relacionamento do Eloquent ORM
     *
    */

    public function parcela()
    {
        return $this->hasOne('Parcela');
    }

    public function clientes()
    {
        return $this->hasMany('Cliente');
    }

}