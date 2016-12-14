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



// Estudiante
Route::get('estudiante/consulta_materias', 'EstudianteController@ConsultarMaterias');
Route::get('estudiante/consulta_horario/{id_horario}', 'EstudianteController@ConsultarHorario');
Route::get('estudiante/lista_companeros', 'EstudianteController@ListaCompaneros');
Route::get('estudiante/lista_profesores', 'EstudianteController@ListaProfesores');
Route::get('estudiante/consulta_nota/{id_materia}/{id_usuario}', 'EstudianteController@ConsultarNota');
Route::get('estudiante/consulta_ausencia/{id_materia}/{id_usuario}', 'EstudianteController@ConsultarAusencia');


// Administrador
//Route::get('admin/inicio', 'AdminController@inicio');
Route::get('admin/registrar_usuario', 'AdminController@registrar_usuario');
Route::get('admin/registrar_materia', 'AdminController@registrar_materia');
Route::get('admin/registrar_matricula', 'AdminController@registrar_matricula');
Route::get('admin/listar_usuarios', 'AdminController@listar_usuarios');
Route::get('admin/cambiar_estado_usuario/{id}/{estado}', 'AdminController@cambiar_estado_usuario');
Route::get('admin/listar_materia', 'AdminController@listar_materias');
Route::get('admin/cambiar_estado_materia/{id}/{estado}', 'AdminController@cambiar_estado_materia');
Route::get('admin/modificar_usuario/{id}', 'AdminController@modificarUsuario');
//Route::get('admin/editar', 'AdminController@editar');
// El listar si esta funcional, pero no deberia de usarse
//Route::get('admin/listar', 'AdminController@listar');
// post
Route::post('admin/insertar_usuario', 'AdminController@insertar_usuario');
Route::post('admin/insertar_materia', 'AdminController@insertar_materia');
Route::post('admin/insertar_matricula', 'AdminController@insertar_matricula');
Route::post('admin/modificar_usuario', 'AdminController@modificar_usuario_post');
//Route::post('admin/actualizar', 'AdminController@actualizar');