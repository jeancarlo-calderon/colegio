@extends('layout')

@section('content')

    <h3>Listado de Usuarios</h3>

    <!--<p><a href="{{ url('horarios/create') }}">Link por eliminar</a></p>-->

    <table class="table table-hover table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Tipo de Usuario</th>
            <th>Activo</th>
            <th>Activar/Desactivar</th>
            <th>Modificar</th>
        </tr>

        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellidos }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->tipoUsuario }}</td>

                @if($usuario->activo == 1)
                    <td>Si</td>
                @else
                    <td>No</td>
                @endif

                <td><a onclick="cambiarEstadoUsuario('{{$usuario->id}}', '{{$usuario->activo}}')" href="#" >Activar/Desactivar</a></td>
                <td><a onclick="modificarUsuario('{{$usuario->id}}')" href="#" >Modificar</a></td>
            </tr>
        @endforeach
    </table>


    <div id="contenedor">

    </div>

    <script>
        function cambiarEstadoUsuario(usuario, estado)
        {
            $.get('/admin/cambiar_estado_usuario/'+ usuario + '/' + estado);
            location.reload();
        }

        function modificarUsuario(usuario)
        {
            $('#contenedor').load('/admin/modificar_usuario/'+ usuario);
        }
    </script>

@endsection