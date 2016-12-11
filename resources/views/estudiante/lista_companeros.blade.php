@extends('layout')

@section('content')

    <h3>Listado de compañeros de {{ $_SESSION['usuario']->nombre }}</h3>
    <br>

    <table class="table table-hover table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Nivel</th>
        </tr>

        @foreach($companeros as $companero)
            <tr>
                <td>{{ $companero->nombre }}</td>
                <td>{{ $companero->apellidos }}</td>
                <td>{{ $companero->correo }}</td>
                <td>{{ $companero->nivel }}</td>
            </tr>
        @endforeach
    </table>

@endsection