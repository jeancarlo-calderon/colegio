<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class ausencia extends Model
{
    public $table = "ausencia";

    public $timestamps = false;

    protected $fillable = array('fecha','justificada','id_usuario','id_materia');
}
