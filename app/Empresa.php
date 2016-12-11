<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $table = "empresa";

    public $timestamps = false;

    protected $fillable = array('cedula','nombre','telefono','correo','direccion','usuario','contrasena');
}
