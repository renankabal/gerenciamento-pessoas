<?php

class DebitosController extends \HelpersController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $busca = Input::get('busca');

        $debitos = Debito::select('*', 'debitos.id as debito_id', 'clientes.nome as cliente', 'clientes.cpf')
                    ->leftJoin('clientes', 'clientes.id', '=', 'debitos.cliente_id');
        
        if($busca){
            if(is_numeric($busca)){
                $debitos = $debitos->whereRaw("clientes.cpf='$busca'");
            }else{
                $debitos = $debitos->where('clientes.nome', 'ilike', "%".$busca."%");
            }
        }

        $debitos = $debitos->orderBy('clientes.nome');
        $debitos = $debitos->paginate(10);
        // de($debitos->toArray());
        return View::make('debitos.index', compact('debitos'));
    }

    /**
     * Show the form for creating a new resource.
     *   * @return Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nome')->lists('id', 'nome');

        return View::make('debitos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs = Input::all();

        $validator = Validator::make($inputs, Debito::$rules);


        if ($validator->fails())
        {
            # Mescla os arrays de erros
            $errors = $validator->errors();

            return Redirect::action('DebitosController@create')->withErrors($errors)->withInput($inputs);
        }

        $inputs['data_debito']  = $this->handleDate($inputs['data_debito']);
        $inputs['valor_debito'] = $this->formataFloat($inputs['valor_debito']);

        DB::beginTransaction();

        $debito = new Debito($inputs);

        if($debito->save()){
            list($ano_debito, $mes_debito, $dia_debito) = explode("-",$debito->data_debito);

            $parcelas=0;

            for($i=1;$i<=Input::get('quantidade_parcelas');$i++){
                $numero_parcela=1;

                $parcela = new Parcela;
                $parcela->debito_id       = $debito->id;
                $parcela->parcela         = $i.'/'.$debito->quantidade_parcelas;
                $parcela->total_parcelas  = $debito->quantidade_parcelas;
                $parcela->valor_parcela   = $debito->valor_debito;
                $parcela->descricao       = $debito->nome;

                $data_vencimento = $ano_debito.'-'.$mes_debito.'-'.$dia_debito;
                $parcela->data_vencimento=$data_vencimento;
                
                ### LÓGICA PARA CADASTRO DA DATA DE VENCIMENTO
                ### SE O MÊS FOR DEZEMBRO PASSA PARA O ANO SEGUINTE, MÊS DE JANEIRO
                if ($mes_debito==12)
                {
                    $mes_debito=0;
                    $ano_debito++;
                }
                
                ### CONCATENA O MÊS DA PARCELA
                $mes_debito++;

                $numero_parcela++;
                if($parcela->save()) $parcelas++;
            }
        DB::commit();  
        }

        return Redirect::action('DebitosController@index')->with('mensagem', 'Débito criado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {


    }

    /**
     *
     * Esses dois métodos são para a inclusão de dependente diretamente da view index do cliente
     */
    public function lista_parcelas($debito_id)
    {
        $parcelas = Parcela::select('parcelas.id as parcela_id',
                                    'clientes.nome as pessoa',
                                    'parcelas.valor_parcela',
                                    'parcelas.descricao',
                                    'parcelas.parcela',
                                    'parcelas.data_pagamento',
                                    'parcelas.parcela_finalizada',
                                    'parcelas.data_vencimento')
                            ->leftJoin('debitos', 'debitos.id', '=', 'parcelas.debito_id')
                            ->leftJoin('clientes', 'clientes.id', '=', 'debitos.cliente_id')
                            ->where('debito_id', $debito_id)->get();
        $pessoa = $parcelas[0]->pessoa;

        return View::make('debitos.lista_parcelas', compact('parcelas', 'pessoa'));
    }
}
