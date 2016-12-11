<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    public $table = "horario";

    public $timestamps = false;

    protected $fillable = array('dia','hora_inicio','hora_fin');
}
