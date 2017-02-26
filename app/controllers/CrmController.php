<?php

class CrmController extends \HelpersController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$crms = Crm::select('crms.id', 'data_agendamento', 'crms_tipos.nome as tipo_crm', 'crms_status.nome as status', 'oportunidades.nome as oportunidade')
					->leftJoin('crms_tipos', 'crms_tipos.id', '=', 'crms.crm_tipo_id')
					->leftJoin('crms_status', 'crms_status.id', '=', 'crms.crm_status_id')
					->leftJoin('oportunidades', 'oportunidades.id', '=', 'crms.oportunidade_id')
					->paginate(10);
		return View::make('crms.index', compact('crms'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$oportunidadeEmpresa = OportunidadeEmpresa::get();
		return View::make('crms.create', compact('OportunidadeEmpresa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createCrm($id)
	{
		$oportunidade = Oportunidade::find($id);
		$crms = CrmTipo::all();
		$crms_status = CrmStatus::all();
		return View::make('crms.confirmar', compact('oportunidade', 'crms', 'crms_status'));
	}

	public function storeCrm()
	{
		$input = Input::all();

        $crm = new Crm($input);
        $crm->usuario_id = Auth::user()->id;
        $crm->data_cadastro = date('Y-m-d H:i:s');
        $crm->save();

        return Redirect::action('CrmController@index')->with('mensagem', 'Crm cadastrado com sucesso!');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$oportunidade = new Oportunidade();

		$validator = Validator::make(Input::all(), Oportunidade::$rules);

		if ($validator->fails())
		{
			return Redirect::action('OportunidadesController@create')->withErrors($validator)->withInput();
		}

		$oportunidade->nome = Input::get('nome');
    	$oportunidade->email = Input::get('email');
    	$oportunidade->telefone = Input::get('telefone');
    	$oportunidade->usuario_id = Auth::user()->id;
    	$oportunidade->data_cadastro = date('Y-m-d H:i:s');
    	$oportunidade->oportunidade_status_id = 4;
    	$oportunidade->oportunidade_empresa_id = Input::get('oportunidade_empresa_id');
		$oportunidade->save();

	    return Redirect::action('HomologacaoController@index')->with('mensagem', 'Oportunidade cadastrada com sucesso.');
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
		return View::make('homologacao.edit', compact('oportunidade', 'oportunidadeEmpresa'));
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

		$validator = Validator::make(Input::all(), Oportunidade::$rules);

		if ($validator->fails())
		{
			return Redirect::action('HomologacaoController@edit', $id)->withErrors($validator)->withInput();
		}

		$oportunidade->nome = Input::get('nome');
    	$oportunidade->email = Input::get('email');
    	$oportunidade->telefone = Input::get('telefone');
    	$oportunidade->usuario_id = Auth::user()->id;
    	$oportunidade->oportunidade_status_id = 4;
    	$oportunidade->oportunidade_empresa_id = Input::get('oportunidade_empresa_id');
		$oportunidade->save();

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
		$result = Oportunidade::where('nome', 'LIKE', '%'.$busca.'%')->orderBy('nome')->paginate(10);

		return view('homologacao.index', compact('result'));
	}

}
