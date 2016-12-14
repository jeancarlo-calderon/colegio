@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Registro de Matricula</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('admin/insertar_matricula')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    {{--Listado de tipos de usuario--}}
                    <div class="form-group">
                        <label for="id_usuario">Alumno:</label>
                        <select name="id_usuario" class="form-control" id="id_usuario">
                            @foreach($id_usuarios as $id_usuario)
                                <li>
                                    <option value="{{ $id_usuario->id }}">{{ $id_usuario->nombre }}</option>
                                </li>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_materia">Materia:</label>
                        <select name="id_materia" class="form-control" id="id_materia">
                            @foreach($id_materias as $id_materia)
                                <li>
                                    <option value="{{ $id_materia->id }}">{{ $id_materia->nombre }}</option>
                                </li>
                            @endforeach
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Registrar usuario</button>
            </form>
        </div>
    </div>
@endsection