<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asociacion extends Model
{
	protected $table = 'asociacion';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();
}
