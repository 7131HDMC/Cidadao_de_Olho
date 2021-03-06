<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/bd_deputados','ConsumirApiController@index');
Route::get('/cidadao_de_olho','CidadaoDeOlhoController@top5_gasto_anual');
Route::get('/cidadao_de_olho/solicitantes/{month}','CidadaoDeOlhoController@top5_solicitantes_mes');
Route::get('/cidadao_de_olho/redes','CidadaoDeOlhoController@redes');


