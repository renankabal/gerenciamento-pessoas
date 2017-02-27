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
		return $html;
    	return PDF::load($html, 'A4', 'portrait')->show();

	}

	/**
	 *Gera o carteirinha do cliente.
	 */	

	public function carne($debito_id) {
		$dados = Parcela::where('debito_id', $debito_id)->get();
		/**
		*Configuraçao
		*Retrato = portrait
		*Paisagem = landscape
		*/
		$html = View::make('relatorios.carne', compact('dados'));
    	return PDF::load($html, 'A4', 'portrait')->show();

	}
}