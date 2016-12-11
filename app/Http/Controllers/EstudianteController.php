<?php

namespace horarios\Http\Controllers;

use horarios\matricula;
use Illuminate\Http\Request;

use horarios\Http\Requests;
use horarios\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    // Consulta de las materias del estudiante que esta logueado
    public function ConsultarMaterias()
    {
        $materias = DB::table('materia')
            ->join('matricula', 'materia.id', '=', 'matricula.id_materia')
            ->select('materia.*')
            ->where('matricula.id_usuario', '=', $_SESSION['usuario']->id)
            ->get();

        return view('estudiante/consulta_materias', compact('materias'));
    }

    // GET: consulta un horario de una materia
    public function ConsultarHorario($id_horarios)
    {
        $horarios = DB::table('horario')
            ->where('id', $id_horarios)
            ->get();

        return view('estudiante/consulta_horario', compact('horarios'));
    }

    public function ListaCompaneros()
    {
        $materias = DB::table('matricula')
            ->select('matricula.id_materia')
            ->where('id_usuario', $_SESSION['usuario']->id)
            ->get();

        $usuarios = DB::table('matricula')
            ->select('matricula.id_usuario')
            ->whereIn('id_materia', json_decode(json_encode($materias), true))
            ->get();

        $companeros = DB::table('usuario')
            ->whereIn('id', json_decode(json_encode($usuarios), true))
            ->where('nivel', $_SESSION['usuario']->nivel)
            ->get();

        return view('estudiante/lista_companeros', compact('companeros'));
    }
}
