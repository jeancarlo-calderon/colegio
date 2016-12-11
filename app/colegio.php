<?php

namespace horarios;

use Illuminate\Database\Eloquent\Model;

class colegio extends Model
{
    public $table = "colegio";

    public $timestamps = false;

    protected $fillable = array('nombre');
}
