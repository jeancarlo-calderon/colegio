@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Registro de Asignatura</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('admin/insertar_materia')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre de la materia"
                           value="{{ old('nombre') }}">
                </div>

                {{--Listado de tipos de usuario--}}
                <div class="form-group">
                    <label for="id_horario">Horario:</label>
                    <select name="id_horario" class="form-control" id="id_horario">
                        @foreach($id_horarios as $id_horario)
                            <li>
                                <option value="{{ $id_horario->id }}">{{ $id_horario->dia.' de '.$id_horario->hora_inicio.' a '.$id_horario->hora_fin }}</option>
                            </li>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="aula" class="form-control" placeholder="Digite numero de aula"
                           value="{{ old('aula') }}">
                </div>

                <div class="form-group">
                    <input type="text" name="nivel" class="form-control" placeholder="Digite el nivel"
                           value="{{ old('nivel') }}">
                </div>

                <div class="form-group">
                    <label class="checkbox-inline"><input name="activo" type="checkbox" value="1">Activo?</label>
                </div>

                <button type="submit" class="btn btn-primary">Registrar materia</button>
            </form>
        </div>
    </div>
@endsection