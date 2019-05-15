<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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


class adminPanel extends Controller
{
	public function home($id){

		return Redirect::to('contenidoPanelAdmin?asociacion='.$id);
	}

	public function createUser($id){
		return Redirect::to('crearUsuario?asociacion='.$id);

	}
}
