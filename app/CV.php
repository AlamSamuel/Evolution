<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CV extends Model
{
	protected $table = 'cvs';

    
	protected $fillable = [
		'id_users','name_user','file','category','date',
	];

    
}
