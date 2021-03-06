<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	#cambiar en produccion
	define("URL_HOME","http://localhost:8000/");

	Route::get('/', function () {
	    return view('welcome');
	});

	Route::auth();

	Route::get('/home', 'HomeController@index');

	Route::get('/test', 'test@test');

	#Categoria
	Route::resource('categoria','categoriaController');

	#Empresa
	Route::resource('empresa','empresaController');

	#Producto
	Route::resource('producto','productoController');
	Route::get('prod_by_categ/{categ}','productoController@prod_by_categ');

	#Tipo Menu
	Route::resource('tipo_menu','tipoMenuController');

	#Menu
	Route::resource('menu','menuController');

	#Detalle Menu
	Route::resource('det_menu','detalleMenuController');

	#Precio combo
	Route::resource('precio_combo','precioComboController');

	#Buscar producto por su ID
	Route::get('prod_by_id/{id}','productoController@find_prod');

	#Pedido manual
	Route::resource('orden_manual','ordenManualController');

	#CRUD usuario
	Route::resource('usuario','usuarioController');

	#Buscar Usuario
	Route::get('buscar_user/{q}', 'usuarioController@buscar_user');

	#Obtener las direcciones de usuario
	Route::get('get_dirs_user/{id_user}', 'usuarioController@dirs_user');

	#CRUD direcciones usuario
	Route::resource('dir_user','dirController');

	#Set dir usuario
	Route::get('set_dir_user/{id}/{id_user}','usuarioController@set_dirs_user');

	#Promociones/combos
	Route::resource('promo_combo','promoController');

	#Detalle de promocion
	Route::resource('det_promo_combo','detallePromocion');

	#Detalle de orden manual
	Route::resource('det_orden_manual','detalleOrden');


