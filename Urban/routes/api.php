<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/root', 'RootController');

Route::resource('/user', 'UserController');

Route::get('/trendy/buscar', 'BuscarController@index');

Route::get('/trendy/cercademi/{lat}/{long}', 'CercaController@show');

Route::get('/trendy/recomendaciones', 'RecoController@index');

Route::get('/trendy/sorprendeme', 'SorpreController@index');

Route::get('/hoy', 'HoyController@index');

Route::get('/noticias', 'NoticiasController@index');
