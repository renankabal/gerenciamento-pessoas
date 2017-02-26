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
		$dados = Cliente::find($id);
		/**
		*Configuraçao
		*Retrato = portrait
		*Paisagem = landscape
		*/
		$html = View::make('relatorios.carteirinha', compact('dados'));
    	return PDF::load($html, 'A4', 'portrait')->show();

	}

}