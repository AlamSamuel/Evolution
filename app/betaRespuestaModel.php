<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class betaRespuestaModel extends Model
{
    protected $table = "betarespuestas";

    protected $fillable = ['id_preguntas','posibles_respuestas',];
}
