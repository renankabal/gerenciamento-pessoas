<?php

class OportunidadesController extends \HelpersController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$oportunidades = Oportunidade::
							where('oportunidade_status_id', 1)
							->where('possui_crm', 's')
							->where('usuario_id', Auth::user()->id)
							->orderBy('nome')
							->paginate(10);
		return View::make('oportunidades.index', compact('oportunidades'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$oportunidadeEmpresa = OportunidadeEmpresa::get();
		return View::make('oportunidades.create', compact('oportunidadeEmpresa'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = Validator::make($input, Oportunidade::$rules);

		if ($validator->fails())
		{
			return Redirect::action('OportunidadesController@create')->withErrors($validator)->withInput();
		}

		$oportunidade = new Oportunidade(array_filter($input));
		$oportunidade->oportunidade_status_id = 1;
		$oportunidade->usuario_id = Auth::user()->id;
		$oportunidade->data_cadastro = date('Y-m-d H:i:s');
		$oportunidade->save();

	    return Redirect::action('OportunidadesController@index')->with('mensagem', 'Oportunidade cadastrada com sucesso.');
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
		$oportunidadeEmpresa = OportunidadeEmpresa::get();
		return View::make('oportunidades.edit', compact('oportunidade', 'oportunidadeEmpresa'));
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
			return Redirect::action('OportunidadesController@edit', $id)->withErrors($validator)->withInput();
		}

		$oportunidade->update(array_filter($input));
		$oportunidade->usuario_id = Auth::user()->id;
		$oportunidade->save();

	    return Redirect::action('OportunidadesController@index')->with('mensagem', 'Oportunidade atualizada com sucesso.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oportunidade = Oportunidade::find($id);
		// O status da oportunidade é alterado para cancelado.
		$oportunidade->oportunidade_status_id = 3;
		$oportunidade->save();

		return Redirect::action('OportunidadesController@index')->with('mensagem', 'Oportunidade cancelada com sucesso.');
	}

	/**
	 * Mostra resultados encontrados pela busca
	 * @return Response
	 */
	public function find()
	{
		$busca = Input::get('busca');
		$oportunidades = Oportunidade::where('oportunidade_status_id', 1)
									->where('nome', 'LIKE', "%$busca%")
									->where('usuario_id', Auth::user()->id)
									->orderBy('nome')
									->paginate(10);
		return View::make('oportunidades.index', compact('oportunidades'));
	}

	/**
	 * Retorna uma oportunidade via ajax para a rota home/oportunidade/{oportunidade_id}
	 * @return Response
	 */
	public function preencheForm($oportunidade_id)
	{
		if(Request::ajax())
	    {
			$oportunidade = Oportunidade::find($oportunidade_id);

			return json_encode($oportunidade);
		}
	}
}
