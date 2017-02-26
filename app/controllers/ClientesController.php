<?php

class ClientesController extends \HelpersController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clientes = Cliente::orderBy('nome')->paginate(10);

		return View::make('clientes.index', compact('clientes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *	 * @return Response
	 */
	public function create()
	{
		$telefoneTipo = TelefoneTipo::get();

		return View::make('clientes.create', compact('telefoneTipo'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputCliente = Input::get('cliente');
		$inputEnderecoCorresp = Input::get('endereco');
		$inputTelefone = Input::get('telefone');

		$inputs = array_merge_recursive($inputCliente, $inputEnderecoCorresp, $inputTelefone);


		$validatorCliente = Validator::make($inputCliente, Cliente::$rules);
		$validatorEnderecoCorresp = Validator::make($inputEnderecoCorresp, EnderecoCorrespondencia::$rules);
		$validatorTelefone = Validator::make($inputTelefone, Telefone::$rules);


		if ($validatorCliente->fails() || $validatorEnderecoCorresp->fails() || $validatorTelefone->fails())
		{
			# Mescla os arrays de erros
			$errors = $validatorCliente->errors();
			$errors->merge($validatorEnderecoCorresp->errors());
			$errors->merge($validatorTelefone->errors());

			return Redirect::action('ClientesController@create')->withErrors($errors)->withInput($inputs);
		}

		//Manipula a data para ser inserida no banco na forma correta
		$inputCliente['data_emissao'] = $this->handleDate($inputCliente['data_emissao']);
		$inputCliente['data_nascimento'] = $this->handleDate($inputCliente['data_nascimento']);

		$cliente = new Cliente(array_filter($inputCliente));
		$endereco = new EnderecoCorrespondencia($inputEnderecoCorresp);
		$telefone = new Telefone($inputTelefone);

		$cliente->save();
		$cliente->enderecoCorrespondencia()->save($endereco);
		
		$cliente->telefone()->save($telefone);

	    return Redirect::action('ClientesController@index')->with('mensagem', 'Cliente cadastrado com sucesso.');
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
		$cliente = Cliente::with('enderecoCorrespondencia', 'telefone')->find($id);
		$telefoneTipo = TelefoneTipo::get();

		// return Response::json($cliente->dependentes);
		return View::make('clientes.edit', compact('cliente', 'telefoneTipo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cliente = Cliente::find($id);

		$inputCliente = Input::get('cliente');
		$inputEnderecoCorresp = Input::get('endereco');
		$inputTelefone = Input::get('telefone');

		$inputs = array_merge_recursive($inputCliente, $inputEnderecoCorresp, $inputTelefone, $inputEnderecoCob);

		$validatorCliente = Validator::make($inputCliente, $this->handleValidation(Cliente::$rules, $id));
		$validatorEnderecoCorresp = Validator::make($inputEnderecoCorresp, EnderecoCorrespondencia::$rules);
		$validatorTelefone = Validator::make($inputTelefone, Telefone::$rules);

		if ($validatorCliente->fails() || $validatorEnderecoCorresp->fails() || $validatorTelefone->fails() || $validatorEnderecoCob->fails())
		{
			# Mescla os arrays de erros
			$errors = $validatorCliente->errors();
			$errors->merge($validatorEnderecoCorresp->errors());
			$errors->merge($validatorTelefone->errors());

			return Redirect::action('ClientesController@edit', $id)->withErrors($errors)->withInput($inputs);
		}

		$inputCliente['data_emissao'] = $this->handleDate($inputCliente['data_emissao']);
		$inputCliente['data_nascimento'] = $this->handleDate($inputCliente['data_nascimento']);
		// Caso alguém altere o valor do input hidden oportunidade_id, não afetará os dados da tabela, visto que
		// este valor nunca mudará a partir do momento em que o cliente é cadastrado.
		$inputCliente['oportunidade_id'] = $cliente->oportunidade_id;

		$cliente->update(array_filter($inputCliente));
		$cliente->enderecoCorrespondencia()->update($inputEnderecoCorresp);
		$cliente->telefone()->update($inputTelefone);

	    return Redirect::action('ClientesController@index')->with('mensagem', 'Cliente atualizado com sucesso.');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$dependentes = Cliente::has('dependentes')->find($id);
		$cobrancas = Cliente::has('cobrancas')->find($id);

		// Exclui o cliente se ele não houver relacionamento com dependentes e cobranças
		if (empty($dependentes) && empty($cobrancas))
		{
			$cliente = Cliente::find($id);
			$cliente->ativo = 0;
			$cliente->save();
			return Redirect::action('ClientesController@index')->with('mensagem', 'Cliente excluído com sucesso.');
		}

		return Redirect::back()->with('mensagem', 'Não foi possível excluir o cliente. Ele tem vínculo com dependentes ou cobranças.');

	}

	/**
	 * Mostra resultados encontrados pela busca
	 * @return Response
	 */
	public function find()
	{
		$busca = Input::get('busca');
		$clientes = Cliente::where('nome', 'LIKE', "%$busca%")
							->orWhere('cpf', $busca)
							->where('ativo', 1)->orderBy('nome')->paginate(10);

		return View::make('clientes.index', compact('clientes'));
	}

	/**
	 *
	 * Esses dois métodos são para a inclusão de dependente diretamente da view index do cliente
	 */
	public function createDependente($id)
	{
		$cliente = Cliente::find($id);
		$tipoDependente = DependenteTipo::all();

		return View::make('dependentes.create', compact('cliente', 'tipoDependente'))->with('clienteController', true);
	}

	public function storeDependente()
	{
		$id = Input::get('cliente_id');

		$input = Input::all();

		$validator = Validator::make($input, Dependente::$rules);

		if ($validator->fails())
		{
			return Redirect::action('ClientesController@createDependente', $id)->withErrors($validator)->withInput();
		}

		$dependente = new Dependente(array_filter($input));
		$dependente->save();

	    return Redirect::action('DependentesController@index')->with('mensagem', 'Dependente cadastrado com sucesso.');
	}

}
