<?php

class HomeController extends BaseController {

	public function home(){

		$oportunidade = Oportunidade::count();
		$cliente = Cliente::count();
		$dependente = Dependente::count();		
		// Monta a exibicao de oportunidades por operador
		$oportunidades_totais = Oportunidade::select(DB::raw('usuarios.nome, count(*) as total'))
			->leftJoin('usuarios', 'usuarios.id', '=', 'oportunidades.usuario_id')
			->where('oportunidade_status_id', '=', 1)
			->groupBy('usuarios.nome')
			->orderBy('total', 'desc')
			->get();
		return View::make('home.inicio', compact('oportunidade', 'cliente', 'dependente', 'oportunidades_totais'));
	}

}