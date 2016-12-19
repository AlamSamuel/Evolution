<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'theme','sub_theme','category','id_users','id_student','id_teacher',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];
}


