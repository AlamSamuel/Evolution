<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
       'title', 'name','content','id_courses','date',
    ];
}
