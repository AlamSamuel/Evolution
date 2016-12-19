<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class betaExamenModel extends Model
{
    protected $table = "betaexamenes";

    protected $primaryKey = "id";

    protected $fillable = ['id_curso', 'titulo', 'codigo_examen', 'fecha',];
}
