<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Validação CSRF
Route::when('*', 'csrf', array('post'));

Route::get('/', 'LoginController@getEntrar');
Route::post('/entrar', 'LoginController@postEntrar');
Route::get('sair', 'LoginController@getSair');

// Verifica se o usuário está logado
Route::group(array('before' => 'auth'), function()
{
    // Rota da home de administracao do sistema
	Route::get('/home', 'HomeController@home');
	Route::post('/enviar', 'UsuarioController@upload');
	// Route::get('/perfil/editar/{id}', 'PerfilController@editar');
	
	//Menus da administraçao
	Route::group(array('prefix' => 'home'), function () {
	    Route::resource('/clientes', 'ClientesController', array('except' => 'show'));
		Route::get('/clientes/find/', 'ClientesController@find');
	    // Adicionar dependentes a partir de Clientes
	    Route::get('/clientes/{cliente_id}/dependente', 'ClientesController@createDependente');
	    Route::post('/clientes/{cliente_id}/dependente', 'ClientesController@storeDependente');
	    // Adiciona um CRM a oportunidade e aos clientes
	    Route::get('/crms/confirmar/{cliente_id}', 'CrmController@createCrm');
		Route::post('/crms/confirmar/{cliente_id}', 'CrmController@storeCrm');
	    
	    Route::resource('/dependentes', 'DependentesController', array('except' => 'show'));
		Route::get('/dependentes/find/', 'DependentesController@find');
	    Route::resource('/zonas', 'ZonasController');
	    Route::resource('/perfis', 'PerfilController');
	    Route::resource('/atendimentos', 'AtendimentosController');
	    Route::resource('/usuarios', 'UsuarioController');
	    Route::resource('/cobrancas', 'CobrancaController');
	    Route::resource('/planos', 'PlanoController');
	    Route::resource('/oportunidades', 'OportunidadesController', array('except' => 'show'));
		Route::get('/oportunidades/find/', 'OportunidadesController@find');

	    Route::resource('/homologacao', 'HomologacaoController', array('except' => array('create', 'store', 'show')));
		Route::get('/homologacao/find/', 'HomologacaoController@find');

	    Route::resource('/crms', 'CrmController');
	    Route::resource('/oportunidades_status', 'OportunidadesStatusController');
	    Route::resource('/fotos', 'FotosController');
	    Route::get('/contrato/{cliente_id}', 'RelatoriosController@contrato');//Gera contrato do cliente
	    Route::get('/boleto/{cliente_id}', 'RelatoriosController@boleto');//Gera boleto do cliente

	    Route::get('/oportunidade/{oportunidade_id}', 'OportunidadesController@preencheForm');//Preenche form cliente
	});

	// Rotas do administrador
    Route::group(array('before' => 'auth.admin'), function()
    {
        Route::resource('usuarios', 'UsersController');
    });
});