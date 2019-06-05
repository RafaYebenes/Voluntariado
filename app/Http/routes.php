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

/**
 * Rutas Asociación
 */

Route::post('createAsociacion', 'asociacionController@create');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('cerrarSesionAso', 'asociacionController@logOut');

Route::group(['middleware' => 'auth'], function () {

	Route::post('createUser', 'usuarioController@create');
	Route::get('GoToCrearUsuario', function(){
		return view('crearUsuario');
	});
	Route::get('GestionarUsuarios', function(){
		return view('gestionarUsuarios');
	});
	Route::get('EliminarUsuario/{id}', 'usuarioController@delete');
	Route::post('UpdateUser', 'usuarioController@update');

	Route::get('GotoCrearActividad', function(){
		return view('crearActividad');
	});
	Route::post('crearActividad', 'ofertaController@create');
	Route::get('GestionarActividades', function (){
		return view('gestionarActividades');
	});
	Route::get('AjustesCuentaAso', function (){
		return view('AjustesCuentaAso');
	});
	Route::post('updateAso', 'asociacionController@update');
	Route::get('PerfilUsuario/{id}', function ($id){
		return view('perfilUsuario')->with("id",$id);
	});
	Route::get('vistaActividad/{id}', function($id){
		return view('vistaActividad')->with("id",$id);
	});

});

Route::get('loginAso',function(){
	return view('auth/loginAso');
});

/**
 * Fin Rutas Asociación
 */

/**
 * Rutas Voluntarios
 */
Route::get('loginVoluntario',function(){
	return view('loginVoluntario');
});
Route::post('createVoluntario', 'voluntarioController@create');
Route::post('loginVoluntario', 'voluntarioController@login');
Route::get('logoutVol', 'voluntarioController@logout');
Route::get('perfilVoluntario/{id}', function($id){
	return view('perfilVoluntario')->with('id',$id);
});
Route::post('UpdateVoluntario', 'voluntarioController@update');
Route::get('inicioVoluntarios/{id}', function ($id){
	return view('inicioVoluntarios')->with('id', $id);
});
/**
 * Fin Rutas Voluntarios
 */

/**
 * Rutas Usuario
 */
Route::post('loginUser', 'usuarioController@login');
Route::get('logoutUser', 'usuarioController@logout');
/**
 * Fin Rutas Usuario
 */

Route::get('/', function () {
	return Auth::check()? view('contenidoPanelAdmin') : view('welcome');
});
