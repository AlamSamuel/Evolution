<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class betaCorrectaModel extends Model
{
    protected $table = "betaCorrectas";
    
    protected $fillable = ['id_preguntas','respuestas_correctas',];
}
