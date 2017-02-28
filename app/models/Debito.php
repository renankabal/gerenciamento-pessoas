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

    /**
     * Validação antes de deletar um débito
     *
     * Remove todos os registros de parcelas do
     * debito caso ainda não tiverem sido pagas
     *
     * @param null
     * @return bool
     */
    protected function beforeDelete()
    {
        DB::beginTransaction();
        if($this->possuiPagamento()){
            DB::rollback();
            return false;
        }
        else{
            foreach ($this->parcelas as $parcela) {        
                $parcela->delete();
            }

            DB::commit();
        }
    }

    /**
     * Método responsável testar se já foi realizado o pagamento de parcelas do Débito
     */
    public function possuiPagamento()
    {        
        $parcelas = Parcela::where('debito_id',$this->id)->whereNotNull('data_pagamento')->get();

        $exite_pagagamento = ($parcelas->count() > 0) ? true : false;
        
        return $exite_pagagamento;
    }
    /*
     *
     * relacionamento do Eloquent ORM
     *
    */

    public function parcela()
    {
        return $this->hasMany('Parcela');
    }

    public function cliente()
    {
        return $this->belongsTo('Cliente');
    }

}