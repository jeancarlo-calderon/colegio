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

    // GET: lista los companeros de clase del estudiante
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

    // GET: lista los profesores el estudiante
    public function ListaProfesores()
    {
        $profesores = DB::table('usuario')
            ->join('materia', 'usuario.id' , '=', 'materia.id_profesor')
            ->join('matricula', 'matricula.id_materia' , '=', 'materia.id')
            ->where('matricula.id_usuario', $_SESSION['usuario']->id)
            ->where('usuario.id_tipo_usuario', 2)
            ->select('usuario.id', 'usuario.nombre', 'usuario.apellidos', 'usuario.correo', 'materia.nombre as materia')
            ->distinct()->get();

        return view('estudiante/lista_profesores', compact('profesores'));
    }

    // GET: consulta las notas
    public function ConsultarNota($id_materia, $id_usuario)
    {
        $nota = DB::table('nota')
            ->where('id_usuario', $id_usuario)
            ->where('id_materia', $id_materia)
            ->get();

        return view('estudiante/consulta_nota', compact('nota'));
    }

    // GET: consulta las ausencias
    public function ConsultarAusencia($id_materia, $id_usuario)
    {
        $ausencias = DB::table('ausencia')
            ->where('id_usuario', $id_usuario)
            ->where('id_materia', $id_materia)
            ->get();

        return view('estudiante/consulta_ausencia', compact('ausencias'));
    }
}
