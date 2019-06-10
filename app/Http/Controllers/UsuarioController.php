<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Authenticatable;

use App\Http\Requests;
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\UsuarioPuntuaVoluntario;
use DateTime;
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
			'avatar'		  => 'image|mimes:jpg,jpeg,bmp,gif,png|max:'.Config::get('app.photo_max_size'),
			'fechaNacimiento' => 'required'
		]);

		$avatar = Image::make($request->file('avatar'));

		$time = strtotime($request->input('fechaNacimiento'),);
		$fecha = date('Y-m-d',$time);

		$usuario = new usuario(array(
			'nombre' 		=> $request->input('name'),
			'apellidos'		=> $request->input('apellidos'),
			'email'			=> $request->input('email'),
			'edad'			=> $fecha,
			'password'		=> bcrypt($request->input('password')),
			'telefono' 		=> $request->input('telefono'),
			'id_asociacion' => $request->input('id'),
		));

		$nameAvatar = str_random(25).'.'.$request->file('avatar')->getClientOriginalExtension();
		$ruta = Config::get('app.url_user_avatar').'/'.$nameAvatar;
		$avatar->resize(200,200);
		$avatar->save($ruta,100);
		$usuario->avatar = $ruta;

		if($usuario->save()){
			return redirect('/')->with('send','Usuario Añadido con exito');
		}else{
			return  redirect('')->with('send', 'Fallo al añadir el usuario');
		}
	}

	public function delete($id){

		if (Auth::check()){
			$usuario = usuario::where('id', $id)->get();
			if ($usuario[0]) {
				unlink($usuario[0]->avatar);

				$usuario[0]->delete();
			}
		}
		return Redirect::to('/');
	}

	public function update(Request $request){

		$this->validate($request, [
			'nombre'            => 'required',
			'apellidos' 	  => 'required',
			'email'    	 	  => 'required',
			'telefono'  	  => 'required',
		]);

		$usuario = usuario::find($request->input('id'));

		$usuario->nombre = $request->input('nombre');
		$usuario->apellidos = $request->input('apellidos');
		$usuario->email = $request->input('email');
		$usuario->telefono = $request->input('telefono');

		if($usuario->save()){
			return redirect('/PerfilUsuario/'.$usuario->id)->with('send','Usuario actualizado con exito');
		}else{
			return  redirect('/PerfilUsuario/'.$usuario->id)->with('send', 'Fallo al actualizar el usuario');
		}
	}

	public function login(Request $request){


		$this->validate($request, [
			'email'    => 'required',
			'password' => 'required',
		]);
		$email = $request->input('email');

		$usuarios = usuario::where('email', $email)->get();
		if(sizeof($usuarios) == 0){
			return redirect('/')->with('send', 'El email usado no existe');
		}
		$usuario = $usuarios[0];

		if(password_verify($request->input('password'), $usuario->password)){
			return view('inicioUsuario')->with('id', $usuario->id);
		}else{
			return redirect('/')->with('send', 'Contraseña incorrecta');
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	public function puntuar(Request $request){
		$this->validate($request, [
			'puntuacion'            => 'required|numeric|max:10|min:0',
		]);

		$ids = explode('_',$request->id );
		$existePuntuacion = UsuarioPuntuaVoluntario::where('id_actividad', $ids[0])->where('id_voluntario', $ids[1])->where('id_usuario', $ids[2])->count();


		if($existePuntuacion == 0){
			$puntuacion = new UsuarioPuntuaVoluntario(array(
				'id_actividad'  => $ids[0],
				'id_voluntario' => $ids[1],
				'id_usuario'	=> $ids[2],
				'puntuacion'	=> $request->input('puntuacion'),
			));

			$puntuacion->save();

			$voluntario = voluntario::find($ids[1]);
			$voluntario->puntuacion =  UsuarioPuntuaVoluntario::where('id_voluntario', $ids[1])->avg('puntuacion');
			$voluntario->save();

			return redirect('puntuacionesUsuario/'.$ids[2])->with('send','Puntuación realizada');
		}else{
			return redirect('puntuacionesUsuario/'.$ids[2])->withError('Ya has puntuado a este usuario');
		}

	}
}
