<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosParticipantes extends Model
{
	protected $table = 'usuariosparticipantes';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();
}
