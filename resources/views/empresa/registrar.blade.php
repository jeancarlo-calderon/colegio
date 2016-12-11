@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Registro de empresa</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('empresa/insertar')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Digite el nombre de usuario"
                           value="{{ old('usuario') }}">
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena" class="form-control" placeholder="Digite la contraseña"
                           value="{{ old('contrasena') }}">
                </div>

                <div class="form-group">
                    <input type="text" name="cedula" class="form-control" placeholder="Digite la cédula"
                           value="{{ old('cedula') }}">
                </div>

                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre de la empresa"
                           value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                    <input type="text" name="telefono" class="form-control" placeholder="Digite el número de teléfono"
                           value="{{ old('telefono') }}">
                </div>

                <div class="form-group">
                    <input type="email" name="correo" class="form-control" placeholder="Digite un correo electrónico"
                           value="{{ old('correo') }}">
                </div>

                <div class="form-group">
                    <textarea name="direccion" class="form-control"
                              placeholder="Digite la dirección">{{ old('direccion') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Registrar empresa</button>
            </form>
        </div>
    </div>
@endsection