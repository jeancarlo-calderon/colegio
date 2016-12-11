<?php

namespace horarios\Http\Controllers;

use horarios\usuario;
use Illuminate\Http\Request;

use horarios\Http\Requests;

class SesionController extends Controller
{
    // POST: realiza el inicio de sesion
    public function iniciar()
    {
        $this->validate(request(),
            [
                'usuario' => ['required', 'max:50'],
                'contrasena' => ['required', 'max:50'],
            ]);

        $data = usuario::where([['usuario', request()['usuario']],
            ['contrasena', request()['contrasena']]])
            ->get();

        // Si se encontro el usuario entonces se crea la sesion y se redirecciona al menu de empresa
        if (count($data) > 0) {
            $_SESSION['usuario'] = $data[0];

            return redirect('/');
        } else // Si no existe el usuario se envia el mensaje de error
        {
            return redirect()->back()->withErrors("Usuario o contraseña invalidos!");
        }
    }

    // GET: realiza el cierre de sesion
    public function cerrar()
    {
        unset($_SESSION['usuario']);

        session_destroy();

        return redirect('/');
    }
}
