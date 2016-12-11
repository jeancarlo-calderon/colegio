<?php

namespace horarios\Http\Controllers;

use Illuminate\Http\Request;

use horarios\Http\Requests;
use horarios\Empresa;

class EmpresaController extends Controller
{
    // GET: Solicita el view de inicio de sesion
    public function inicio()
    {
        // Retorna el view para realizar el inicio de sesion o el registro
        return view('empresa/inicio');
    }

    // POST: realiza el inicio de sesion
    public function  iniciarSesion()
    {

    }

    // GET: Lista todas las empresas
    public function listar()
    {
        // Carga todas las empresas en el modelo Empresa
        $empresas = Empresa::all();

        // Retorna el view listar, con el compact empresas. Se pasan todas las empresas a la vista
        return view('empresa/listar', compact('empresas'));
    }

    // GET: Muestra el view para crear la empresa
    public function registrar()
    {
        return view('empresa/registrar');
    }

    // GET: Muestra el view para editar la empresa
    public function editar()
    {
        $empresa = Empresa::where('id', 1)
                            ->get();

        return view('empresa/editar', compact("empresa"));
    }

    // POST: Guarda el nuevo registro de la empresa
    public function insertar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'cedula'=> ['required', 'max:12'],
                'nombre'=> ['required', 'max:150'],
                'telefono'=> ['required', 'max:8'],
                'correo'=> ['required', 'max:150'],
                'direccion'=> ['required', 'max:300'],
                'usuario'=> ['required', 'max:50'],
                'contrasena'=> ['required', 'max:50'],
            ]);

        $data = request()->all();

        Empresa::create($data);

        return redirect()->to('empresa/listar');
    }

    // POST: Guarda los cambios de la empresa
    public function actualizar()
    {
        // Realiza la validacion de los campos
        $this->validate(request(),
            [
                'cedula'=> ['required', 'max:12'],
                'nombre'=> ['required', 'max:150'],
                'telefono'=> ['required', 'max:8'],
                'correo'=> ['required', 'max:150'],
                'direccion'=> ['required', 'max:300'],
                'usuario'=> ['required', 'max:50'],
                'contrasena'=> ['required', 'max:50'],
            ]);

        $task = Empresa::findOrFail(1);

        $data = request()->all();

        $task->fill($data)->save();

        return redirect()->to('empresa/listar');
    }
}
