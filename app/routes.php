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
	    Route::resource('/clientes', 'ClientesController');
	    
	    // Adicionar dependentes a partir de Clientes
	    Route::get('/clientes/{cliente_id}/dependente', 'ClientesController@createDependente');
	    Route::post('/clientes/{cliente_id}/dependente', 'ClientesController@storeDependente');
	    
	    // Adiciona um CRM a oportunidade e aos clientes
	    Route::get('/crms/confirmar/{cliente_id}', 'CrmController@createCrm');
		Route::post('/crms/confirmar/{cliente_id}', 'CrmController@storeCrm');
	    
	    Route::resource('/dependentes', 'DependentesController');
	    Route::resource('/perfis', 'PerfilController');
	    Route::resource('/usuarios', 'UsuarioController');

	    Route::resource('/debitos', 'DebitosController');	    
	    Route::get('/debitos/{debito_id}/lista_parcelas', 'DebitosController@lista_parcelas');

	    Route::resource('/parcelas', 'ParcelasController');

	    Route::resource('/fotos', 'FotosController');

	    // RELATÓRIOS DO SISTEMA
	    Route::get('/carteirinha/{cliente_id}', 'RelatoriosController@carteirinha');//Gera carteirinha do cliente
		Route::get('/carne/{debito_id}', 'RelatoriosController@carne');//Gera carteirinha do cliente

	});

	// Rotas do administrador
    Route::group(array('before' => 'auth.admin'), function()
    {
        Route::resource('usuarios', 'UsersController');
    });
});