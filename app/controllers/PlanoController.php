<?php

class PlanoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$planos = Plano::orderBy('valor')->paginate(10);
		return View::make('planos.index', compact('planos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('planos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// $validator = Validator::make($input, Plano::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::action('PlanoController@create')->withErrors($validator)->withInput();
		// }

		$plano = new Plano();
		$plano->nome = Input::get('nome');
		$plano->descricao = Input::get('descricao');
		$plano->valor = implode(".", explode(",", Input::get('valor')));
		// dd($plano->valor);
		$plano->save();

	    return Redirect::action('PlanoController@index')->with('mensagem', 'Plano cadastrado com sucesso!');
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$planos = Plano::find($id);

		return View::make('planos.edit', compact('planos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$planos = Plano::find($id);

		$input = Input::all();

		$validator = Validator::make($input, Plano::$rules);

		if ($validator->fails())
		{
			return Redirect::action('PlanoController@edit', $id)->withErrors($validator)->withInput();
		}

		$perfil->update();

	    return Redirect::action('PlanoController@index')->with('mensagem', 'Plano atualizado com sucesso.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$planos = Plano::find($id);
		$planos->delete();

		return Redirect::action('PlanoController@index')->with('mensagem', 'Plano excluído com sucesso.');
	}

	/**
	 * Mostra resultados encontrados pela busca
	 * @return Response
	 */
	public function find()
	{
		$busca = Input::get('busca');
		$result = Plano::where('nome', 'LIKE', '%'.$busca.'%')->orderBy('nome')->paginate(10);

		return view('planos.index', compact('result'));
	}


}
