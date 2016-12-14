@extends('layout')

@section('content')

    <h3>Listado de Materias</h3>

    <!--<p><a href="{{ url('horarios/create') }}">Link por eliminar</a></p>-->

    <table class="table table-hover table-bordered">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Num Aula</th>
            <th>Dia</th>
            <th>Hora inicio</th>
            <th>Hora fin</th>
            <th>Activo</th>
            <th>Activar/Desactivar</th>
        </tr>

        @foreach($materias as $materia)
            <tr>
                <td>{{ $materia->id }}</td>
                <td>{{ $materia->nombre }}</td>
                <td>{{ $materia->nivel }}</td>
                <td>{{ $materia->aula }}</td>
                <td>{{ $materia->dia }}</td>
                <td>{{ $materia->hora_inicio }}</td>
                <td>{{ $materia->hora_fin }}</td>
                @if($materia->activo == 1)
                    <td>Si</td>
                @else
                    <td>No</td>
                @endif
                <td><a onclick="cambiarEstadoMateria('{{$materia->id}}', '{{$materia->activo}}')" href="#" >Activar/Desactivar</a></td>
            </tr>
        @endforeach
    </table>
    <script>
        function cambiarEstadoMateria(materia, estado)
        {
            $.get('/admin/cambiar_estado_materia/'+ materia + '/' + estado);
            location.reload();
        }
    </script>

@endsection