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

	public function carne_avulso($debito_id) {
		$dados = Parcela::select('clientes.nome as pessoa', 'clientes.cpf', 'clientes.matricula',
								'parcelas.descricao', 'parcelas.parcela', 'parcelas.valor_parcela',
								'parcelas.data_vencimento', 'parcelas.valor_pago', 'parcelas.data_pagamento',
								'enderecos_correspondencias.cep', 'enderecos_correspondencias.logradouro',
								'enderecos_correspondencias.numero', 'enderecos_correspondencias.bairro',
								'enderecos_correspondencias.cidade', 'enderecos_correspondencias.estado')
						->leftJoin('debitos', 'debitos.id', '=', 'parcelas.debito_id')
						->leftJoin('clientes', 'clientes.id', '=', 'debitos.cliente_id')
						->leftJoin('enderecos_correspondencias', 'enderecos_correspondencias.cliente_id', '=', 'clientes.id')
						->where('debito_id', $debito_id)->get();
		/**
		*Configuraçao
		*Retrato = portrait
		*Paisagem = landscape
		*/
		return $html = View::make('relatorios.carne_avulso', compact('dados'));

	}

	/**
	 *Gera o comprovante de pagamento do cliente.
	 */	

	public function comprovante($parcela) {
		$dados = Parcela::select('clientes.nome as pessoa', 'clientes.cpf', 'clientes.matricula',
								'parcelas.descricao', 'parcelas.parcela', 'parcelas.valor_parcela',
								'parcelas.data_vencimento', 'parcelas.valor_pago', 'parcelas.data_pagamento')
						->leftJoin('debitos', 'debitos.id', '=', 'parcelas.debito_id')
						->leftJoin('clientes', 'clientes.id', '=', 'debitos.cliente_id')
						->where('parcelas.id', $parcela)->first();
		/**
		*Configuraçao
		*Retrato = portrait
		*Paisagem = landscape
		*/
		return $html = View::make('relatorios.comprovante', compact('dados'));

	}
}