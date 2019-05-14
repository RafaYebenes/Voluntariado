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
Route::post('loginAsociacion', 'asociacionController@login');
Route::get('cerrarSesionAso', 'asociacionController@logOut');
//Fin controlador asociación

//Controlador Panel de Administración
Route::get('homeAdminPanel/{id}', 'adminPanel@home');
Route::get('crearUsuario/{id}', 'adminPanel@createUser');
//FIn Controlador Panel de Administración



Route::get('login',function(){
	return view('login');
});

Route::get('contenidoPanelAdmin', function(){
	return view('contenidoPanelAdmin');
});

Route::get('/', function () {
	return view('welcome');
});
