<?php

class EventosController extends \HelpersController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $busca = Input::get('busca');

        $eventos = Evento::select('*');
        
        if($busca){ $eventos = $eventos->where('nome', 'ilike', "%".$busca."%"); }

        $eventos = $eventos->orderBy('nome');
        $eventos = $eventos->paginate(10);

        return View::make('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *   * @return Response
     */
    public function create()
    {
        return View::make('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $validator = Validator::make($input, Evento::$rules);

        if ($validator->fails())
        {
            return Redirect::action('EventosController@create')->withErrors($validator)->withInput();
        }

        $evento = new Evento($input);
        //Manipula a data para ser inserida no banco na forma correta
        $evento['data_evento'] = $this->handleDate($input['data_evento']);
        $evento->save();

        return Redirect::action('EventosController@index')->with('mensagem', 'Evento cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        return View::make('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $evento = Evento::find($id);
        
        $input = Input::all();

        $validator = Validator::make($input, Evento::$rules);

        if ($validator->fails())
        {
            return Redirect::action('EventosController@edit', $id)->withErrors($validator)->withInput();
        }

        $evento->update();

        return Redirect::action('EventosController@index')->with('mensagem', 'Evento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return Redirect::action('EventosController@index')->with('mensagem', 'Evento excluído com sucesso.');
    }

}
