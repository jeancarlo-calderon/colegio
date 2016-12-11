<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    public $table = "usuario";

    public $timestamps = false;

    protected $fillable = array('nombre','apellidos','correo','usuario','contrasena','nivel','id_tipo_usuario','id_colegio');
}
