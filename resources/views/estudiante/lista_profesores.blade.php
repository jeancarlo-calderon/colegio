@extends('layout')

@section('content')

    <h3>Listado de profesores de {{ $_SESSION['usuario']->nombre }}</h3>
    <br>

    <table class="table table-hover table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Materia impartida</th>
        </tr>

        @foreach($profesores as $profesor)
            <tr>
                <td>{{ $profesor->nombre }}</td>
                <td>{{ $profesor->apellidos }}</td>
                <td>{{ $profesor->correo }}</td>
                <td>{{ $profesor->materia }}</td>
            </tr>
        @endforeach
    </table>
@endsection