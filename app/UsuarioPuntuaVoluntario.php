<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPuntuaVoluntario extends Model
{
	protected $table = 'puntuacionusuario';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();
}
