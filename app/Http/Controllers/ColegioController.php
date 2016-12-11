<?php

namespace horarios\Http\Controllers;

use Illuminate\Http\Request;

use horarios\Http\Requests;
use horarios\colegio;

class ColegioController extends Controller
{
    // GET: Solicita el view de inicio de sesion
    public function inicio()
    {
        // Retorna el view para realizar el inicio de sesion o el registro
        return view('colegio/inicio');
    }

    // POST: realiza el inicio de sesion
    public function  iniciarSesion()
    {

    }

    // GET: Lista todas los colegios
    public function listar()
    {
        // Carga todas los colegios en el modelo colegio
        $colegios = colegio::all();

        // Retorna el view listar, con el compact colegios. Se pasan todos los colegios a la vista
        return view('colegio/listar', compact('colegios'));
    }

    // GET: Muestra el view para crear el colegio
    public function registrar()
    {
        return view('colegio/registrar');
    }

    // GET: Muestra el view para editar el colegio
    public function editar()
    {
        $colegio = colegio::where('id', 1)
                            ->get();

        return view('colegio/editar', compact("colegio"));
    }

    // POST: Guarda el nuevo registro del colegio
    public function insertar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'nombre'=> ['required', 'max:100'],
            ]);

        $data = request()->all();

        colegio::create($data);

        return redirect()->to('colegio/listar');
    }

    // POST: Guarda los cambios del colegio
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

        return redirect()->to('colegio/listar');
    }
}
