<?php

namespace horarios\Http\Controllers;

use Illuminate\Http\Request;

use horarios\Http\Requests;
use horarios\horario;

class HorarioController extends Controller
{
    // GET: Solicita el view de inicio de sesion
    public function inicio()
    {
        // Retorna el view para realizar el inicio de sesion o el registro
        return view('horario/inicio');
    }

    // POST: realiza el inicio de sesion
    public function  iniciarSesion()
    {

    }

    // GET: Lista todas los horarios
    public function listar()
    {
        // Carga todas los horarios en el modelo horario
        $horario = horario::all();

        // Retorna el view listar, con el compact horario. Se pasan todas las horario a la vista
        return view('horario/listar', compact('horarios'));
    }

    // GET: Muestra el view para crear la horario
    public function registrar()
    {
        return view('horario/registrar');
    }

    // GET: Muestra el view para editar la horario
    public function editar()
    {
        $horario = horario::where('id', 1)
                            ->get();

        return view('horario/editar', compact("horario"));
    }

    // POST: Guarda el nuevo registro de la horario
    public function insertar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
            ]);

        $data = request()->all();

        horario::create($data);

        return redirect()->to('horario/listar');
    }

    // POST: Guarda los cambios de la horario
    public function actualizar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
            ]);

        $task = horario::findOrFail(1);

        $data = request()->all();

        $task->fill($data)->save();

        return redirect()->to('horario/listar');
    }
}
