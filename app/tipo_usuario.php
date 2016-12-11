<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class tipo_usuario extends Model
{
    public $table = "empresa";

    public $timestamps = false;

    protected $fillable = array('nombre');
}
