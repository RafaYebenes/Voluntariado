<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asociacion;
use App\usuario;
use App\voluntario;
use DateTime;
use Auth;
use Input;
use Image;
use Redirect;
use File;
use Validator;
use DB;
use Config;

class voluntarioController extends Controller
{
	public function create(Request $request){


		$this->validate($request, [
			'name'            => 'required',
			'apellidos' 	  => 'required',
			'email'    	 	  => 'required',
			'password'  	  => 'required',
			'telefono'  	  => 'required',
			'avatar'		  => 'image|mimes:jpg,jpeg,bmp,gif,png|max:'.Config::get('app.photo_max_size'),
			'fechaNacimiento' => 'required',
			'direccion'		  => 'required',
			'pais'      	  => 'required',
			'provincia' 	  => 'required',
			'poblacion' 	  => 'required',
			'cp'        	  => 'required',
		]);

		$avatar = Image::make($request->file('avatar'));

		$time = strtotime($request->input('fechaNacimiento'),);
		$fecha = date('Y-m-d',$time);

		$voluntario = new voluntario(array(
			'nombre' 		=> $request->input('name'),
			'apellidos'		=> $request->input('apellidos'),
			'email'			=> $request->input('email'),
			'edad'			=> $fecha,
			'password'		=> bcrypt($request->input('password')),
			'telefono' 		=> $request->input('telefono'),
			'pais'			=> $request->input('pais'),
			'provincia'		=> $request->input('provincia'),
			'poblacion'		=> $request->input('poblacion'),
			'cp'			=> $request->input('cp'),
		));

		$nameAvatar = str_random(25).'.'.$request->file('avatar')->getClientOriginalExtension();
		$ruta = Config::get('app.url_voluntarios_avatar').'/'.$nameAvatar;
		$avatar->resize(200,200);
		$avatar->save($ruta,100);
		$voluntario->avatar = $ruta;

		if($voluntario->save()){
			return view('baseVoluntarios');
		}else{
			return  redirect('')->with('send', 'Fallo al añadir el voluntario');
		}
	}
}
