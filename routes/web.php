<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


session_start();


// RUTAS EMPRESA
Route::get('empresa/inicio', 'EmpresaController@inicio');
Route::get('empresa/registrar', 'EmpresaController@registrar');
Route::get('empresa/editar', 'EmpresaController@editar');
// El listar si esta funcional, pero no deberia de usarse 
Route::get('empresa/listar', 'EmpresaController@listar');
Route::post('empresa/insertar', 'EmpresaController@insertar');
Route::post('empresa/actualizar', 'EmpresaController@actualizar');

// PRINCIPAL
Route::get('/', 'PrincipalController@inicio');

// SESION
Route::post('sesion/iniciar', 'SesionController@iniciar');
Route::get('sesion/cerrar', 'SesionController@cerrar');


// colegio
Route::get('colegio/inicio', 'ColegioController@inicio');
Route::get('colegio/registrar', 'ColegioController@registrar');
Route::get('colegio/editar', 'ColegioController@editar');
// El listar si esta funcional, pero no deberia de usarse
Route::get('colegio/listar', 'ColegioController@listar');
// post
Route::post('colegio/insertar', 'ColegioController@insertar');
Route::post('colegio/actualizar', 'ColegioController@actualizar');

// ausencia
Route::get('ausencia/inicio', 'AusenciaController@inicio');
Route::get('ausencia/registrar', 'AusenciaController@registrar');
Route::get('ausencia/editar', 'AusenciaController@editar');
// El listar si esta funcional, pero no deberia de usarse
Route::get('ausencia/listar', 'AusenciaController@listar');
// post
Route::post('ausencia/insertar', 'AusenciaController@insertar');
Route::post('ausencia/actualizar', 'AusenciaController@actualizar');