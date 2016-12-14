<?php

namespace horarios\Http\Controllers;

use horarios\materia;
use horarios\matricula;
use Illuminate\Http\Request;

use horarios\Http\Requests;
use horarios\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use horarios\usuario;

class AdminController extends Controller
{
    //registrar usuario
    public function registrar_usuario()
    {
        $id_tipo_usuarios = DB::table('tipo_usuario')
            ->select('tipo_usuario.*')
            ->get();
        $id_colegios = DB::table('colegio')
            ->select('colegio.*')
            ->get();
        return view('admin/registrar_usuario', compact('id_tipo_usuarios','id_colegios'));
    }
    public function insertar_usuario()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
                'apellidos'=> ['required', 'max:100'],
                'correo'=> ['required', 'max:100'],
                'usuario'=> ['required', 'max:100'],
                'contrasena'=> ['required', 'max:100'],
                'id_tipo_usuario'=> ['required', 'max:100'],
                'id_colegio'=> ['required', 'max:100'],
                'nivel'=> ['required', 'max:100'],
                'activo'=> [ ],
            ]);

        $data = request()->all();

        usuario::create($data);

        return redirect()->to('/');
    }
    //registrar materia
    public function registrar_materia()
    {
        $id_horarios = DB::table('horario')
            ->select('horario.*')
            ->get();
        return view('admin/registrar_materia', compact('id_horarios'));
    }
    public function insertar_materia()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
                'id_horario'=> ['required', 'max:100'],
                'aula'=> ['required', 'max:100'],
                'nivel'=> ['required', 'max:100'],
                'activo'=> [ ],
            ]);

        $data = request()->all();

        materia::create($data);

        return redirect()->to('/');
    }
    //registrar matricula
    public function registrar_matricula()
    {
        $id_usuarios = DB::table('usuario')
            ->select('usuario.*')
            ->get();
        $id_materias = DB::table('materia')
            ->select('materia.*')
            ->get();
        return view('admin/registrar_matricula', compact('id_usuarios','id_materias'));
    }
    public function insertar_matricula()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'id_usuario'=> ['required'],
                'id_materia'=> ['required'],
            ]);

        $data = request()->all();

        matricula::create($data);

        return redirect()->to('/');
    }

    public function listar_usuarios()
    {
        $usuarios = DB::table('usuario')
            ->join('tipo_usuario', 'usuario.id_tipo_usuario', '=', 'tipo_usuario.id')
            ->select('usuario.id','usuario.nombre', 'usuario.apellidos', 'usuario.correo', 'tipo_usuario.nombre as tipoUsuario', 'usuario.activo')
            ->get();

        return view('admin/listar_usuarios', compact('usuarios'));
    }
    public function listar_materias()
    {
        $materias = DB::table('materia')
            ->join('horario', 'materia.id_horario', '=', 'horario.id')
            ->select('materia.id', 'materia.nombre','materia.nivel','materia.aula', 'materia.activo', 'horario.dia', 'horario.hora_inicio', 'horario.hora_fin')
            ->get();

        return view('admin/listar_materia', compact('materias'));
    }
    public function cambiar_estado_materia($id, $estado)
    {
        $newEstado = 0;

        if($estado == 0)
            $newEstado = 1;
        else
            $newEstado = 0;

        $materias = DB::table('materia')
            ->where('id', $id)
            ->update(['activo' => $newEstado]);

        return redirect()->to('admin/listar_materia');
    }

    public function cambiar_estado_usuario($id, $estado)
    {
        $newEstado = 0;

        if($estado == 0)
            $newEstado = 1;
        else
            $newEstado = 0;

        $usuarios = DB::table('usuario')
            ->where('id', $id)
            ->update(['activo' => $newEstado]);

        return redirect()->to('admin/listar_usuarios');
    }

    public function modificarUsuario($id)
    {
        $usuario = DB::table('usuario')
            ->where('id', $id)
            ->get();

        $tipoUsuario = DB::table('tipo_usuario')->get();

        return view('admin/modificar_usuario', compact('usuario', 'tipoUsuario'));
    }

    public function modificar_usuario_post()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
                'apellidos'=> ['required', 'max:100'],
                'correo'=> ['required', 'max:100'],
                'usuario'=> ['required', 'max:100'],
                'contrasena'=> ['required', 'max:100'],
                'id_tipo_usuario'=> ['required', 'max:100'],
                'id_colegio'=> ['required', 'max:100'],
                'nivel'=> ['required', 'max:100'],
                'activo'=> [ ],
            ]);

        $data = request()->all();

        $task = usuario::findOrFail($_REQUEST['id']);

        $task->fill($data)->save();

        return redirect()->to('admin/listar_usuarios');
    }

    public function insertar_alumno()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
                'id_horario'=> ['required', 'max:100'],
                'aula'=> ['required', 'max:100'],
                'nivel'=> ['required', 'max:100'],
                'activo'=> [ ],
            ]);

        $data = request()->all();

        materia::create($data);

        return redirect()->to('/');
    }


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

    public function ListaProfesores()
    {
        $profesores = DB::table('usuario')
            ->join('materia', 'usuario.id' , '=', 'materia.id_profesor')
            ->join('matricula', 'matricula.id_materia' , '=', 'materia.id')
            ->where('matricula.id_usuario', $_SESSION['usuario']->id)
            ->where('usuario.id_tipo_usuario', 2)
            ->select('usuario.id', 'usuario.nombre', 'usuario.apellidos', 'usuario.correo')
            ->distinct()->get();

        return view('estudiante/lista_profesores', compact('profesores'));
    }

    #modificar usuario
    public function editar_usuario()
    {
        $colegio = colegio::where('id', 1)
            ->get();

        return view('colegio/editar', compact("colegio"));
    }
    #modificar usuario
    public function actualizar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
            ]);

        $task = colegio::findOrFail(1);

        $data = request()->all();

        $task->fill($data)->save();

        return redirect()->to('/');
    }
}
