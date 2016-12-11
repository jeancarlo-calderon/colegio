<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    public $table = "nota";

    public $timestamps = false;

    protected $fillable = array('trimestre','nota','id_usuario','id_materia');
}
