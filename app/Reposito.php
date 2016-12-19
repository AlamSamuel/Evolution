<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reposito extends Model
{
    protected $fillable = [
       'name', 'type_documents','content','route','id_users','date',
    ];
}


