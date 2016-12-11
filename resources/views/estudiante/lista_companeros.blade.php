@extends('layout')

@section('content')

    <h3>Listado de compañeros {{ $_SESSION['usuario']->nombre }}</h3>

    <table class="table table-hover">
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

        {{--{{ var_dump($companeros) }}--}}
    </table>

@endsection