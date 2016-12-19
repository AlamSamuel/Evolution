<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class betaPreguntaModel extends Model
{
    protected $table = "betapreguntas";

    protected $fillable = ['id_examenes','texto','tipo_pregunta','fecha',];
}
