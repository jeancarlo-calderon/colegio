@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Editar información del ausencia</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('ausencia/actualizar')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre del colegio"
                           value="{{ $ausencia[0]->nombre }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection