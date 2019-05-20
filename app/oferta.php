<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oferta extends Model
{
	protected $table = 'oferta';
	public $timestamps = false;

    //Set guarded to an empty array to allow mass assignment of every field
	protected $guarded = array();

}
