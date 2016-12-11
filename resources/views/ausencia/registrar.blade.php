@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Registro del ausencia</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('ausencia/insertar')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    <input type="text" name="fecha" class="form-control" placeholder="Digite fecha de la ausencia"
                           value="{{ old('fecha') }}">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="justificada" class="form-control" placeholder="La ausencia es justificada?"
                           value="{{ old('justificada') }}">
                </div>
                <div class="form-group">
                    <input type="text" name="id_usuario" class="form-control" placeholder="Ingrese el estudiante"
                           value="{{ old('id_usuario') }}">
                </div>
                <div class="form-group">
                    <input type="text" name="id_materia" class="form-control" placeholder="Seleccione la materia"
                           value="{{ old('id_materia') }}">
                </div>

                <button type="submit" class="btn btn-primary">Registrar ausencia</button>
            </form>
        </div>
    </div>
@endsection