<?php

class HomologacaoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$oportunidades = Oportunidade::select('oportunidades.nome', 'oportunidades.id', 'usuarios.nome as usuario', 'oportunidades.email', 'oportunidades.telefone', 'oportunidades.oportunidade_empresa_id')
							->where('oportunidade_status_id', 1)
							->leftJoin('usuarios', 'usuarios.id', '=', 'oportunidades.usuario_id')
							->orderBy('nome')
							->paginate(10);

		return View::make('homologacao.index', compact('oportunidades'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// 
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oportunidade = Oportunidade::find($id);
		$oportunidadeStatus = OportunidadeStatus::get();
		$oportunidadeEmpresa = OportunidadeEmpresa::get();
		return View::make('homologacao.edit', compact('oportunidade', 'oportunidadeStatus', 'oportunidadeEmpresa'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$oportunidade = Oportunidade::find($id);

		$input = Input::all();

		$validator = Validator::make($input, Oportunidade::$rules);

		if ($validator->fails())
		{
			return Redirect::action('HomologacaoController@edit', $id)->withErrors($validator)->withInput();
		}

		$oportunidade->update($input);

		$oportunidade->usuario_id = Auth::user()->id;
		$oportunidade->save();

		// Se o status for finalizado, o usuário é redirecionado para a tela de cadastro do cliente.
		if ($oportunidade->oportunidade_status_id == 2)
		{
			return Redirect::action('ClientesController@create')->with('mensagem', 'Oportunidade finalizada com sucesso.');
		}

		return Redirect::action('HomologacaoController@index')->with('mensagem', 'Oportunidade atualizada com sucesso.');
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
	 * Mostra resultados encontrados pela busca
	 * @return Response
	 */
	public function find()
	{
		$busca = Input::get('busca');

		$oportunidades = Oportunidade::where('nome', 'LIKE', "%$busca%")->orderBy('nome')->paginate(10);

		return View::make('homologacao.index', compact('oportunidades'));
	}

}
