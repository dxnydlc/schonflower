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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/test', 'test@test');

#Categoria
Route::resource('categoria','categoriaController');

#Producto
Route::resource('producto','productoController');
Route::get('prod_by_categ/{categ}','productoController@prod_by_categ');

#Tipo Menu
Route::resource('tipo_menu','tipoMenuController');

#Menu
Route::resource('menu','menuController');
