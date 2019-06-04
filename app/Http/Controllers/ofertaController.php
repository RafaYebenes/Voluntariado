<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\asociacion;
use App\usuario;
use App\oferta;
use App\UsuariosParticipantes;
use Auth;
use Input;
use Redirect;
use Image;
use File;
use Validator;
use DB;
use Config;

class ofertaController extends Controller
{
	public function create(Request $request){
		$this->validate($request, [
			'name'     	  	 => 'required',
			'descripcion' 	 => 'required',
			'lugar'		  	 => 'required',
			'fecha'		  	 => 'required',
			'hora'		 	 => 'required|max:5',
			'VolNecesarios'  => 'required|int',
		]);

		$fechaStr = strtotime($request->input('fecha').' '.$request->input('hora'));
		$fecha = date('Y-m-d H:i',$fechaStr);
		$oferta = new oferta (array(
			'nombre' => $request->input('name'),
			'descripcion' => $request->input('descripcion'),
			'fecha'		  => $fecha,
			'lugar'		  => $request->input('lugar'),
			'voluntarios_necesarios' => $request->input('VolNecesarios'),
			'id_asociacion' 		 => $request->input('id')
		));
		$oferta->save();

		$id = $request->input('id');

		$usuarios = usuario::where('id_asociacion', $id)->get();

		foreach ($usuarios as $value) {
			if($request->input('Usuario'.$value->id)){
				$usuarioParticipante = new UsuariosParticipantes (array(
					'id_oferta'  => $oferta->id,
					'id_usuario' =>	$value->id
				));
				$usuarioParticipante->save();
			}
		};
		return view('crearActividad')->with('send', 'Actividad creada con exito!');

	}
}
