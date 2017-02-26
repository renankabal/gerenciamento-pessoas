<?php

class Parcela extends Eloquent {

    /**
     * Tabela usada pela model no banco
     *
     * @var string
     */
    protected $table = 'parcelas';

    /*
     *
     * variável fillable é usada para atribuição em massa
     * http://laravel.com/docs/4.2/eloquent#mass-assignment
    */
    protected $fillable = [
        'debito_id',
        'descricao',
        'parcela',
        'total_parcela',
        'valor_parcela',
        'data_vencimento',
        'valor_pago',
        'data_pagamento',
        'parcela_finalizada',
        'observacao'
    ];

    /*
     *
     * regras de validação
     * 
    */
    public static $rules = [
        'debito_id'        => 'required|debitos',
        'parcela'          => 'required',
        'total_parcela'    => 'required',
        'valor_parcela'    => 'required',
        'data_vencimento'  => 'required|date_format:d/m/Y'
    ];

    /*
     *
     * relacionamento do Eloquent ORM
     * 
    */
    public function cliente()
    {
        return $this->belongsTo('Cliente');
    }

    public function dependenteTipo()
    {
        return $this->belongsTo('DependenteTipo');
    }

}