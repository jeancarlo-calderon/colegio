<?php

namespace horarios\Http\Controllers;

use Illuminate\Http\Request;

use horarios\Http\Requests;
use horarios\ausencia;

class AusenciaController extends Controller
{
    // GET: Solicita el view de inicio de sesion
    public function inicio()
    {
        // Retorna el view para realizar el inicio de sesion o el registro
        return view('ausencia/inicio');
    }

    // POST: realiza el inicio de sesion
    public function  iniciarSesion()
    {

    }

    // GET: Lista todas las ausencias
    public function listar()
    {
        // Carga todas las ausencias en el modelo ausencia
        $ausencia = ausencia::all();

        // Retorna el view listar, con el compact ausencia. Se pasan todas las ausencias a la vista
        return view('ausencia/listar', compact('ausencias'));
    }

    // GET: Muestra el view para crear la ausencia
    public function registrar()
    {
        return view('ausencia/registrar');
    }

    // GET: Muestra el view para editar la ausencia
    public function editar()
    {
        $ausencia = ausencia::where('id', 1)
                            ->get();

        return view('ausencia/editar', compact("ausencia"));
    }

    // POST: Guarda el nuevo registro de la ausencia
    public function insertar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
            ]);

        $data = request()->all();

        $ausencia::create($data);

        return redirect()->to('ausencia/listar');
    }

    // POST: Guarda los cambios de la ausencia
    public function actualizar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
            ]);

        $task = ausencia::findOrFail(1);

        $data = request()->all();

        $task->fill($data)->save();

        return redirect()->to('ausencia/listar');
    }
}
