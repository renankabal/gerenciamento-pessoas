<?php

class UsuarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = Usuario::orderBy('nome')->paginate(10);
		return View::make('usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$perfis = Perfil::get();
		return View::make('usuarios.create', compact('perfis'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function upload()
    {
        $input = Input::all();

        $extension = $input['foto']->guessExtension();
        $directory = public_path() . '/upload/perfis';
        $filename = sha1(Auth::user()->id . time()) . ".{$extension}";

        $upload_success = $input['foto']->move($directory, $filename);

        $usuario = new Usuario();
        $usuario->email = Input::get('email');
        $usuario->senha = Hash::make(Input::get('senha'));
        $usuario->nome = Input::get('nome');
        $usuario->perfil_id = Input::get('perfil_id');
        $usuario->foto = $filename;

        $usuario->save();

        return Redirect::action('UsuarioController@index')->with('mensagem', 'Usuario cadastrado com sucesso!');
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
		$usuarios = Usuario::find($id);

		return View::make('usuarios.edit', compact('usuarios'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usuario = Usuario::find($id);

		$input = Input::all();

		$validator = Validator::make($input, Usuario::$rules);

		if ($validator->fails())
		{
			return Redirect::action('usuarioController@edit', $id)->withErrors($validator)->withInput();
		}

		$usuario->update();

	    return Redirect::action('UsuarioController@index')->with('mensagem', 'Usuario atualizado com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = Usuario::find($id);
		$usuario->delete();

		return Redirect::action('UsuarioController@index')->with('mensagem', 'Usuario excluído com sucesso.');
	}

	/**
	 * Mostra resultados encontrados pela busca
	 * @return Response
	 */
	public function find()
	{
		$busca = Input::get('busca');
		$result = Usuario::where('nome', 'LIKE', '%'.$busca.'%')->orderBy('nome')->paginate(10);

		return view('usuarios.index', compact('result'));
	}


}
