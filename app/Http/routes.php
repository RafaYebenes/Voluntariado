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

//Fin controlador asociación




Route::get('login',function(){
	return view('login');
});
Route::get('adminPanelAsociacion', function(){
	return view('adminPanelAsociacion');
});
Route::get('/', function () {
	return view('welcome');
});
