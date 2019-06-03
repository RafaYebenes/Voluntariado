<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;

use App\Http\Requests;
use App\asociacion;
use Auth;
use Input;
use Redirect;
use Image;
use File;
use Validator;
use DB;
use Config;
class asociacionController extends Controller
{
	public function create(Request $request){

		$this->validate($request, [
			'name'      => 'required',
			'direccion' => 'required',
			'pais'      => 'required',
			'provincia' => 'required',
			'poblacion' => 'required',
			'cp'        => 'required',
			'email'     => 'required',
			'password'  => 'required',
			'web'       => 'required',
			'avatar'	=> 'image|mimes:jpg,jpeg,bmp,gif,png|max:'.Config::get('app.photo_max_size'),
			'telefono'  => 'required',
		]);

		$avatar = Image::make($request->file('avatar'));


		$asociacion = new asociacion(array(
			'nombre'      => $request->input('name'),
			'direccion' => $request->input('direccion'),
			'pais'      => $request->input('pais'),
			'provincia' => $request->input('provincia'),
			'poblacion' => $request->input('poblacion'),
			'cp'        => $request->input('cp'),
			'email'     => $request->input('email'),
			'password'  => bcrypt($request->input('password')),
			'web'       => $request->input('web'),
			'telefono'  => $request->input('telefono'),
		));

		$nameAvatar = str_random(25).'.'.$request->file('avatar')->getClientOriginalExtension();
		$ruta = Config::get('app.url_asociacion_avatar').'/'.$nameAvatar;
		$avatar->resize(200,200);
		$avatar->save($ruta,100);
		$asociacion->avatar = $ruta;

		if($asociacion->save()){
			return Redirect::to('auth/login')->with('send','Registro completado con exito!');
		}
	}
	public function update(Request $request){

		$this->validate($request, [
			'name'      => 'required',
			'direccion' => 'required',
			'pais'      => 'required',
			'provincia' => 'required',
			'poblacion' => 'required',
			'cp'        => 'required',
			'email'     => 'required',
			'web'       => 'required',
			'telefono'  => 'required',
		]);

		$asociacion = asociacion::find( $request->input('id'));
		$asociacion->nombre = $request->input('name');
		$asociacion->direccion = $request->input('direccion');
		$asociacion->pais =  $request->input('pais');
		$asociacion->provincia = $request->input('provincia');
		$asociacion->poblacion = $request->input('poblacion');
		$asociacion->cp = $request->input('cp');
		$asociacion->email = $request->input('email');
		$asociacion->web = $request->input('web');
		$asociacion->telefono = $request->input('telefono');

		if($asociacion->save()){
			return view('AjustesCuentaAso')->with('send', 'Perfil actualizado con exito');
		}else{
			return view('AjustesCuentaAso')->withErrors('send', 'Fallo al actualizar el perfil');
		}
	}

	public function	logOut(){
		Auth::logout();
		return Redirect::to('/');
	}
}
