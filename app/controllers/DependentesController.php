<?php

class DependentesController extends \HelpersController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$dependentes = Dependente::select('dependentes.nome', 'dependentes.id', 'dependentes_tipos.nome as tipo', 'dependentes.cpf', 'clientes.nome as cliente')
							->leftJoin('clientes', 'clientes.id', '=', 'dependentes.cliente_id')
							->leftJoin('dependentes_tipos', 'dependentes_tipos.id', '=', 'dependentes.dependente_tipo_id')
							->orderBy('nome')
							->paginate(10);
		return View::make('dependentes.index', compact('dependentes'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clientes = Cliente::orderBy('nome')->lists('id', 'nome');
		$tipoDependente = DependenteTipo::all();

		return View::make('dependentes.create', compact('clientes', 'tipoDependente'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = Validator::make($input, Dependente::$rules);

		if ($validator->fails())
		{
			return Redirect::action('DependentesController@create')->withErrors($validator)->withInput();
		}

		$input['data_nascimento'] = $this->handleDate($input['data_nascimento']);

		$dependente = new Dependente(array_filter($input));
		$dependente->save();

	    return Redirect::action('DependentesController@index')->with('mensagem', 'Dependente cadastrado com sucesso.');
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
		$dependente = Dependente::with('cliente')->find($id);

		$dependenteTipo = DependenteTipo::lists('id', 'nome');

		return View::make('dependentes.edit', compact('dependente', 'dependenteTipo'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$dependente = Dependente::find($id);

		$input = Input::all();

		$validator = Validator::make($input, $this->handleValidation(Dependente::$rules, $id));

		if ($validator->fails())
		{
			return Redirect::action('DependentesController@edit', $id)->withErrors($validator)->withInput();
		}

		$input['data_nascimento'] = $this->handleDate($input['data_nascimento']);

		$dependente->update(array_filter($input));

	    return Redirect::action('DependentesController@index')->with('mensagem', 'Dependente atualizado com sucesso.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$dependente = Dependente::find($id);
		$dependente->delete();

		return Redirect::action('DependentesController@index')->with('mensagem', 'Dependente excluído com sucesso.');
	}

	/**
	 * Mostra resultados encontrados pela busca
	 * @return Response
	 */
	public function find()
	{
		$busca = Input::get('busca');
		$dependentes = Dependente::select('dependentes.nome', 'dependentes.id', 'dependentes_tipos.nome as tipo', 'dependentes.cpf', 'clientes.nome as cliente')
								->leftJoin('clientes', 'clientes.id', '=', 'dependentes.cliente_id')
								->leftJoin('dependentes_tipos', 'dependentes_tipos.id', '=', 'dependentes.dependente_tipo_id')
								->where('dependentes.nome', 'LIKE', "%$busca%")
								->orWhere('dependentes.cpf', $busca)
								->orderBy('dependentes.nome')->paginate(10);

		return View::make('dependentes.index', compact('dependentes'));
	}

}
