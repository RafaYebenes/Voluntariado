<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voluntario extends Model
{
	protected $table = 'voluntario';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();
}
