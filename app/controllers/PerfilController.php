<?php

class PerfilController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$perfis = Perfil::orderBy('nome')->paginate(10);

		return View::make('perfil.index', compact('perfis'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('perfil.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = Validator::make($input, Perfil::$rules);

		if ($validator->fails())
		{
			return Redirect::action('PerfilController@create')->withErrors($validator)->withInput();
		}

		$perfil = new Perfil($input);
		$perfil->save();

	    return Redirect::action('PerfilController@index')->with('mensagem', 'Perfil cadastrado com sucesso!');
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
		$perfil = Cliente::find($id);

		return View::make('perfil.edit', compact('perfil'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cliente = Perfil::find($id);

		$input = Input::all();

		$validator = Validator::make($input, Perfil::$rules);

		if ($validator->fails())
		{
			return Redirect::action('PerfilController@edit', $id)->withErrors($validator)->withInput();
		}

		$perfil->update();

	    return Redirect::action('PerfilController@index')->with('mensagem', 'Perfil atualizado com sucesso.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$perfil = Perfil::find($id);
		$perfil->delete();

		return Redirect::action('PerfilController@index')->with('mensagem', 'Perfil excluído com sucesso.');
	}

	/**
	 * Mostra resultados encontrados pela busca
	 * @return Response
	 */
	public function find()
	{
		$busca = Input::get('busca');
		$result = Perfil::where('nome', 'LIKE', '%'.$busca.'%')->orderBy('nome')->paginate(10);

		return view('perfil.index', compact('result'));
	}


}
