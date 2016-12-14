@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Registro del usuario</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('admin/insertar_usuario')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre del usuario"
                           value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                    <input type="text" name="apellidos" class="form-control"
                           placeholder="Digite los apellidos del usuario"
                           value="{{ old('apellidos') }}">
                </div>

                <div class="form-group">
                    <input type="text" name="correo" class="form-control" placeholder="Digite el correo del usuario"
                           value="{{ old('correo') }}">
                </div>

                <div class="form-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Digite el usuario"
                           value="{{ old('usuario') }}">
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena" class="form-control"
                           placeholder="Digite la contrasena del usuario"
                           value="{{ old('contrasena') }}">
                </div>

                {{--Listado de tipos de usuario--}}
                <div class="form-group">
                    <label for="tipo">Tipo de Usuario:</label>
                    <select name="id_tipo_usuario" class="form-control" id="tipo_usuario">
                        @foreach($id_tipo_usuarios as $tipo)
                            <li>
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            </li>
                        @endforeach
                    </select>
                </div>

                {{--Listado de tipos de usuario--}}
                <div class="form-group">
                    <label for="colegios">Colegio:</label>
                    <select name="id_colegio" class="form-control" id="$colegios">
                        @foreach($id_colegios as $colegio)
                            <li>
                                <option value="{{ $colegio->id }}">{{ $colegio->nombre }}</option>
                            </li>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="nivel" class="form-control" placeholder="Digite el nivel del usuario"
                           value="{{ old('nivel') }}">
                </div>

                <div class="form-group">
                    <label name="activo" class="checkbox-inline"><input type="checkbox" value="1" checked>Activo?</label>
                </div>

                <button type="submit" class="btn btn-primary">Registrar usuario</button>
            </form>
        </div>
    </div>
@endsection