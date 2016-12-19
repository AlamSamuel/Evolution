<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model

{  protected $fillable = [
        'id_users','title','type_events','evento','fecha',
    ];

	 public function user() { 
 return $this->belongsTo('App\User');
 }
}