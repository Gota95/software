<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTA PARA MODULO DE PRODUCTO
Route::resource('categoria','CategoriaController');
Route::resource('articulo','ArticuloController');
Route::resource('venta','VentaController');
Route::resource('ingreso','IngresoController');

//RUTA PARA MODULO DE USUARIOS
Route::resource('tipo','TipoController');
Route::resource('users','UsersController');
Route::resource('persona','PersonaController');

//RUTA PARA MODULO DE REPORTES
Route::name('imprimir')->get('/imprimir','RVentasController@imprimir');
Route::name('productos')->get('/productos','RProductosController@imprimir');
