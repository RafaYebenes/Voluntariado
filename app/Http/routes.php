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

//Controlador asociación

Route::post('createAsociacion', 'asociacionController@create');
Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::post('loginAsociacion', 'asociacionController@login');
Route::get('cerrarSesionAso', 'asociacionController@logOut');
//Fin controlador asociación


Route::group(['middleware' => 'auth'], function () {

	Route::post('createUser', 'usuarioController@create');



	Route::get('GoToCrearUsuario', function(){
		return view('crearUsuario');
	});
});


Route::get('loginAso',function(){
	return view('auth/loginAso');
});

Route::get('loginVoluntario',function(){
	return view('loginVoluntario');
});


Route::get('/', function () {
	return Auth::check()? view('contenidoPanelAdmin') : view('welcome');
});
