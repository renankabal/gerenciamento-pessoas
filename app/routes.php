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
	
	//MENUS DE ADMINISTRAÇÃO
	Route::group(array('prefix' => 'home'), function () {
	    // ROTAS GLOBAIS
	    Route::resource('/clientes', 'ClientesController');
	    Route::resource('/fotos', 'FotosController');
	    Route::resource('/dependentes', 'DependentesController');
	    Route::resource('/perfis', 'PerfilController');
	    Route::resource('/usuarios', 'UsuarioController');
	    Route::resource('/debitos', 'DebitosController');
	    Route::resource('/parcelas', 'ParcelasController');

	    // ADICIONA DEPENDENTES A PARTIR DE CLIENTE
	    Route::get('/clientes/{cliente_id}/dependente', 'ClientesController@createDependente');
	    Route::post('/clientes/{cliente_id}/dependente', 'ClientesController@storeDependente');
	    	    
	   	// PASSAR PARA PARCELAS
	    Route::get('/debitos/{debito_id}/lista_parcelas', 'DebitosController@lista_parcelas');

	    // ROTAS PARA PAGAMENTO
	    Route::get('/parcelas/{cliente_id}/pagamento', 'ParcelasController@efetuaPagamento');
	    Route::post('/parcelas/{cliente_id}/pagamento', 'ParcelasController@storePagamento');
	    

	    // RELATÓRIOS DO SISTEMA
	    Route::get('/carteirinha/{cliente_id}', 'RelatoriosController@carteirinha');
		Route::get('/carne_avulso/{debito_id}', 'RelatoriosController@carne_avulso');
		Route::get('/comprovante/{parcela_id}', 'RelatoriosController@comprovante');

		// ROTAS DE EXCLUSÃO
	    Route::get('/debitos/{debito_id}/delete', 'DebitosController@destroyDebitoParcelas');
	});

	// ROTAS DO ADMINISTRADOR
    Route::group(array('before' => 'auth.admin'), function()
    {
        Route::resource('usuarios', 'UsersController');
    });
});