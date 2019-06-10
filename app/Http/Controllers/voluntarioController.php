<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asociacion;
use App\usuario;
use App\voluntario;
use App\oferta;
use App\UsuariosParticipantes;
use App\VoluntariosParticipantes;
use App\VoluntarioPuntuaUsuario;
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
			return view('loginVoluntario')->with('send', 'Registro Completado con exito');
		}else{
			return  redirect('')->with('send', 'Fallo al añadir el voluntario');
		}
	}

	public function login(Request $request){
		$this->validate($request, [
			'email'    => 'required',
			'password' => 'required',
		]);
		$email = $request->input('email');

		$voluntarios = voluntario::where('email', $email)->get();
		if(sizeof($voluntarios) == 0){
			return redirect('/')->with('send', 'El email usado no existe');
		}
		$voluntario = $voluntarios[0];

		if(password_verify($request->input('password'), $voluntario->password)){
			return view('/inicioVoluntarios')->with('id', $voluntario->id);
		}else{
			return redirect('/')->with('send', 'Contraseña incorrecta');
		}
	}
	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
	public function update(Request $request){

		$this->validate($request, [
			'nombre'            => 'required',
			'apellidos' 	  => 'required',
			'email'    	 	  => 'required',
			'telefono'  	  => 'required',
		]);

		$voluntario = voluntario::find($request->input('id'));

		$voluntario->nombre = $request->input('nombre');
		$voluntario->apellidos = $request->input('apellidos');
		$voluntario->email = $request->input('email');
		$voluntario->telefono = $request->input('telefono');

		if($voluntario->save()){
			return redirect('/perfilVoluntario/'.$voluntario->id)->with('send','voluntario actualizado con exito');
		}else{
			return  redirect('/perfilVoluntario/'.$voluntario->id)->with('send', 'Fallo al actualizar el usuario');
		}
	}

	public function apuntame(String $id){

		$ids = explode('_',$id );
		$idActividad = $ids[0];
		$idVoluntario = $ids[1];

		$actividad = oferta::find($idActividad);
		$voluntariosApuntados = VoluntariosParticipantes::where('id_oferta', $actividad->id)->count();
		if(($voluntariosApuntados+1)<=$actividad->voluntarios_necesarios){



			$participante = new VoluntariosParticipantes(array(
				'id_oferta' => $idActividad,
				'id_voluntario' => $idVoluntario,
			));

			if($participante->save()){
				return redirect('actividadesVoluntarios/'.$id)->with('send','te has apuntado con exito');
			}else{
				return redirect('actividadesVoluntarios/'.$id)->withError('Fallo al inscribirte en la actividad');
			}
		}else{
			return redirect('actividadesVoluntarios/'.$id)->withError('Lo siento, la actividad esta completa');
		}

	}

	public function puntuar(Request $request){
		$this->validate($request, [
			'puntuacion'            => 'required|numeric|max:10|min:0',
		]);

		$ids = explode('_',$request->id );
		$existePuntuacion = VoluntarioPuntuaUsuario::where('id_actividad', $ids[0])->where('id_voluntario', $ids[1])->where('id_usuario', $ids[2])->count();


		if($existePuntuacion == 0){
			$puntuacion = new VoluntarioPuntuaUsuario(array(
				'id_actividad'  => $ids[0],
				'id_voluntario' => $ids[1],
				'id_usuario'	=> $ids[2],
				'puntuacion'	=> $request->input('puntuacion'),
			));

			$puntuacion->save();

			$usuario = usuario::find($ids[2]);
			$usuario->puntuacion =  VoluntarioPuntuaUsuario::where('id_usuario', $ids[2])->avg('puntuacion');
			$usuario->save();

			return redirect('puntuacionesVoluntario/'.$ids[1])->with('send','Puntuación realizada');
		}else{
			return redirect('puntuacionesVoluntario/'.$ids[1])->withError('Ya has puntuado a este usuario');
		}

	}
}
