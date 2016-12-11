<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class materia extends Model
{
    public $table = "materia";

    public $timestamps = false;

    protected $fillable = array('nombre','id_horario','aula','nivel', 'activo');
}
