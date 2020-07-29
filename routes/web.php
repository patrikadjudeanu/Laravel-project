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

//HOMEPAGE

Route::get('/', function () {
    return view('pages/home');
});


//PROCESE VERBALE

Route::get('/proceseVerbale', 'ProcesVerbalController@index');

Route::post('/proceseVerbale', 'ProcesVerbalController@store');

Route::get('/proceseVerbale/create', 'ProcesVerbalController@create');

Route::get('/proceseVerbale/{cod}', 'ProcesVerbalController@show');

Route::delete('/proceseVerbale/{cod}', 'ProcesVerbalController@destroy');

Route::patch('/proceseVerbale/{cod}', 'ProcesVerbalController@update');


//CLIENTI


Route::get('/clienti', 'ClientController@index');

Route::post('/clienti', 'ClientController@store');

Route::get('/clienti/create', 'ClientController@create');

Route::get('/clienti/{cod}', 'ClientController@show');

Route::delete('/clienti/{cod}', 'ClientController@destroy');

Route::patch('/clienti/{cod}', 'ClientController@update');


//DOCUMENTE

Route::get('/documente/proces/{cod}', 'DocumentController@show');

Route::post('/documente/proces/semnare/{cod}', 'DocumentController@update');

Route::post('/documente/proces/trimiteProces/{cod}', 'DocumentController@sendProces');

Route::post('/documente/firma/trimiteProcese/{cod}', 'DocumentController@sendProcesFirma');