<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    
    protected $table = 'wikis';

    protected $fillable = [
    'title','content',
    ];
}
