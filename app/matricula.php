<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class matricula extends Model
{
    public $table = "matricula";

    public $timestamps = false;

    protected $fillable = array('id_usuario','id_materia');
}
