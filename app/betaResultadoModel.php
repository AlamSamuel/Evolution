<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class betaResultadoModel extends Model
{
    protected $table = "betaresultados";

    protected $fillable = ['id_examen_practica','id_estudiante','tipo_evaluacion','resultado','fecha',];
}
