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




Route::get('loginAso',function(){
	return view('loginAso');
});

Route::get('loginVoluntario',function(){
	return view('loginVoluntario');
});
Route::get('adminPanelAsociacion', function(){
	return view('adminPanelAsociacion');
});
Route::get('/', function () {
	return view('welcome');
});
