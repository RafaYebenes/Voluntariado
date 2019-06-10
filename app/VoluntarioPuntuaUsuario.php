<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoluntarioPuntuaUsuario extends Model
{
	protected $table = 'puntuacionvoluntario';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();
}
