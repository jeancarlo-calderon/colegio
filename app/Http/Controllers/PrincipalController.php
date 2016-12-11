<?php

namespace horarios\Http\Controllers;

use Illuminate\Http\Request;

use horarios\Http\Requests;

class PrincipalController extends Controller
{
    public function inicio()
    {
        return view("consulta");
    }
}
