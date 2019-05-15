<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Authenticatable;

use App\Http\Requests;
use App\asociacion;
use Auth;
use Input;
use Image;
use Redirect;
use File;
use Validator;
use DB;
use Config;


class UsuarioController extends Controller
{
	public function create(Request $request){

		$this->validate($request, [
			'name'            => 'required',
			'apellidos' 	  => 'required',
			'email'    	 	  => 'required',
			'password'  	  => 'required',
			'telefono'  	  => 'required',
			//'avatar'		  =>  'image|mimes:jpg,jpeg,bmp,gif,png|max:'.Config::get('app.photo_max_size'),
			'fechaNacimiento' => 'required'
		]);


		$avatar = Image::make($request->input('avatar'));


		$usuario = new usuario(array(
			'nombre' 		=> $request->input('name'),
			'apellidos'		=> $request->input('apellidos'),
			'edad'			=> $request->input('fechaNacimiento'),
			'password'		=> $request->input('password'),
			'telefono' 		=> $request->input('telefono'),
			'id_asociacion' => $request->input('id'),
		));
		$rutaAvatar = Config::get('app.url_user_avatar').'user'.$usuario->id;
		$avatar->save($ruta.$avatar->getClientOriginalExtension());
		$usuario->avatar = $ruta;

		if($usuario->save()){
			return redirect('/')->with('send','Usuario Añadido con exito');
		}else{
			return  redirect('')->with('send', 'Fallo al añadir el usuario');
		}
	}
}
