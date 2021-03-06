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

        $eventos = Evento::select('eventos.nome', 'eventos.id', 'eventos.data_evento','eventos.anual',
                                'eventos_icones.nome as icone')
                            ->leftJoin('eventos_icones', 'eventos_icones.id', '=', 'eventos.evento_icone_id');
        
        if($busca){ $eventos = $eventos->where('eventos.nome', 'ilike', "%".$busca."%"); }

        $eventos = $eventos->orderBy('eventos.created_at', 'desc');
        $eventos = $eventos->paginate(10);

        return View::make('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *   * @return Response
     */
    public function create()
    {
        $icones = EventoIcone::all();
        return View::make('eventos.create', compact('icones'));
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
        
        if(empty(Input::get('hora_evento'))){
            $evento['hora_evento'] = null;
        }
        
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
        $icones = EventoIcone::all();

        return View::make('eventos.edit', compact('evento', 'icones'));
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
        //Manipula a data para ser inserida no banco na forma correta
        $evento['nome']            = $input['nome'];
        $evento['evento_icone_id'] = $input['evento_icone_id'];
        $evento['data_evento']     = $this->handleDate($input['data_evento']);
        if(empty(Input::get('hora_evento'))){
            $evento['hora_evento'] = null;
        }else{
            $evento['hora_evento']     = $input['hora_evento'];
        }
        $evento['anual']           = $input['anual'];
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

    public function lista_eventos($data_evento) {
        
        if (Request::ajax()) {
            list($anoEvento, $mesEvento, $diaEvento) = explode("-", $data_evento);
            $eventos = Evento::select('eventos.nome','eventos.descricao','eventos.data_evento','eventos.hora_evento',
                                    'eventos_icones.nome as icone')
                                ->leftJoin('eventos_icones', 'eventos_icones.id', '=', 'eventos.evento_icone_id')
                                ->where(DB::raw("date_part('day', eventos.data_evento)"), $diaEvento)
                                ->where(DB::raw("date_part('month', eventos.data_evento)"), $mesEvento)
                                ->where(DB::raw("date_part('year', eventos.data_evento)"), $anoEvento)
                                ->orderBy('eventos.nome', 'asc')
                                ->get();

            foreach($eventos as $evento){
                $evento->data_evento = format_date($evento->data_evento);
                $evento->hora_evento = isset($evento->hora_evento) ? formata_hora($evento->hora_evento) : '--:--';
            }

            $response['data'] = $eventos;

            return Response::json($response);
        }
    }
}
