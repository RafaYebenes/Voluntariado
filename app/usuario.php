<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
	protected $table = 'usuario';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();
}
