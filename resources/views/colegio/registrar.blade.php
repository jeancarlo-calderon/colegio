@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <h3>Registro del colegio</h3>

            <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
            @include('partials/errors')

            <form method="post" action="{{url('colegio/insertar')}}" class="form">
            {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre del colegio"
                           value="{{ old('nombre') }}">
                </div>

                <button type="submit" class="btn btn-primary">Registrar colegio</button>
            </form>
        </div>
    </div>
@endsection