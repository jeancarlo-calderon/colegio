@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Editar información de empresa</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('empresa/actualizar')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Digite el nombre de usuario"
                           value="{{ $empresa[0]->usuario }}">
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena" class="form-control" placeholder="Digite la contraseña"
                           value="{{ $empresa[0]->contrasena }}">
                </div>

                <div class="form-group">
                    <input type="text" name="cedula" class="form-control" placeholder="Digite la cédula"
                           value="{{ $empresa[0]->cedula }}">
                </div>

                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre de la empresa"
                           value="{{ $empresa[0]->nombre }}">
                </div>

                <div class="form-group">
                    <input type="text" name="telefono" class="form-control" placeholder="Digite el número de teléfono"
                           value="{{ $empresa[0]->telefono }}">
                </div>

                <div class="form-group">
                    <input type="email" name="correo" class="form-control" placeholder="Digite un correo electrónico"
                           value="{{ $empresa[0]->correo }}">
                </div>

                <div class="form-group">
                    <textarea name="direccion" class="form-control"
                              placeholder="Digite la dirección">{{ $empresa[0]->direccion }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection