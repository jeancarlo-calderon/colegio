@extends('layout')

@section('content')

    <h3>Listado de empresas de buses</h3>

    <!--<p><a href="{{ url('horarios/create') }}">Link por eliminar</a></p>-->

    <ul>
        <!-- $empresas es una coleccion de empresas y dentro de ella hay muchas empresas ($empresa) -->
        <!-- $empresa representa el modelo Empresa -->
        @foreach($empresas as $empresa)
            <li>Nombre: {{ $empresa->nombre }} - Usuario: {{ $empresa->usuario }} - Correo: {{ $empresa->correo }}</li>
        @endforeach
    </ul>

@endsection