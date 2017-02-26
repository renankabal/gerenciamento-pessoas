<?php

class HomeController extends BaseController {

	public function home(){
        $pessoas_sexo = DB::select('select count(sexo) as total, sexo from clientes GROUP BY sexo');

		return View::make('home.inicio', compact('pessoas_sexo'));
	}

}