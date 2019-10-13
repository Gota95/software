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
Route::resource('tipo','TipoController');
Route::resource('persona','PersonaController');
Route::resource('venta','VentaController');
Route::resource('ingreso','IngresoController');