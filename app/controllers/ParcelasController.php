<?php

class ParcelasController extends \HelpersController {

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
     * Abre a parcela para pagamento
     */
    public function efetuaPagamento($parcela_id)
    {
        $parcela = Parcela::find($parcela_id);
        return View::make('parcelas.efetuaPagamento', compact('parcela'));
    }

    public function storePagamento($parcela_id)
    {
        $debito_id = Input::get('debito_id');
        $parcela_id= Input::get('parcela_id');

        $input = Input::all();

        $parcela = Parcela::find($parcela_id);
        // $validator = Validator::make($input, Parcela::$rules);

        // if ($validator->fails())
        // {
        //     return Redirect::action('PagamentosController@efetuaPagamento', $parcela_id)->withErrors($validator)->withInput();
        // }

        $input['data_pagamento']  = $this->handleDate($input['data_pagamento']);
        $input['valor_pago'] = $this->formataFloat($input['valor_pago']);

        $parcela->parcela_finalizada = 'true';
        $parcela->update($input);

        return Redirect::action('DebitosController@lista_parcelas', $debito_id)->with('mensagem', 'Pagamento realizado com sucesso.');
    }

    public function cancelaPagamento($parcela_id)
    {
        $parcela = Parcela::find($parcela_id);

        $parcela->valor_pago         = null;
        $parcela->data_pagamento     = null;        
        $parcela->parcela_finalizada = 'false';
        $parcela->update();

        return Redirect::action('DebitosController@lista_parcelas', $parcela->debito_id)->with('mensagem', 'Cancelamento realizado com sucesso.');
    }

}
