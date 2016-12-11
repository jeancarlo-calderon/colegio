@extends('layout')

@section('content')

    <h3>Listado de Ausencias</h3>

    <!--<p><a href="{{ url('horarios/create') }}">Link por eliminar</a></p>-->

    <ul>
        <!-- $empresas es una coleccion de empresas y dentro de ella hay muchas empresas ($empresa) -->
        <!-- $empresa representa el modelo Empresa -->
        @foreach($ausencias as $ausencia)
            <li>Nombre: {{ $ausencia->nombre }}</li>
        @endforeach
    </ul>

@endsection