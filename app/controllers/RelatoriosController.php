<?php
/**
 * @name Controle Relatorios
 * @map
 */
class RelatoriosController extends BaseController {
	
	/**
	 *Gera o carteirinha do cliente.
	 */	

	public function carteirinha($id) {
		$clientes = Cliente::find($id);
		/**
		*Configuraçao
		*Retrato = portrait
		*Paisagem = landscape
		*/
		$html = View::make('relatorios.carteirinha', compact('clientes'));
    	return PDF::load($html, 'A4', 'portrait')->show();

	}

}