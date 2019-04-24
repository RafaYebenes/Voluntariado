<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class asociacionController extends Controller
{
	public function create(){
		this->validate($request, [
			'name'      => 'required',
			'direccion' => 'required',
			'pais'      => 'required',
			'provincia' => 'required',
			'poblacion' => 'required',
			'cp'        => 'required',
			'email'     => 'required',
			'password'  => 'required',
			'web'       => 'required',
			'telefono'  => 'required',
		]);

	}
}
