<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoluntariosParticipantes extends Model
{
	protected $table = 'voluntariosparticipantes';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();
}
