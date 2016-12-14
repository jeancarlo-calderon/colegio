@extends('layout')

@section('content')
    <h3>Horarios de {{ $_SESSION['usuario']->nombre }}</h3>
    <br>

    <table class="table table-hover table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Aula</th>
            <th>Horario</th>
            <th>Notas</th>
            <th>Ausencias</th>
        </tr>

        @foreach($materias as $materia)
        <tr>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->nivel }}</td>
            <td>{{ $materia->aula }}</td>
            <td><a data-toggle="modal" data-target="#horarios" onclick="consultaHorario({{ $materia->id_horario }})" href="#">Ver Horario</a></td>
            <td><a data-toggle="modal" data-target="#horarios" onclick="consultaNota('{{ $materia->id }}', '{{ $_SESSION['usuario']->id }}')" href="#">Ver notas</a></td>
            <td><a data-toggle="modal" data-target="#horarios" onclick="consultaAusencia('{{ $materia->id }}', '{{ $_SESSION['usuario']->id }}')" href="#">Ver ausencias</a></td>
        </tr>
        @endforeach
    </table>

    <div id="horarios" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detalle materia</h4>
                </div>
                <div class="modal-body">
                    <div id="contenedor">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type='text/javascript' >
        function consultaHorario(horario){
            $("#contenedor").load('/estudiante/consulta_horario/'+ horario +'');
        }

        function consultaNota(idMateria, idUsuario){
            $("#contenedor").load('/estudiante/consulta_nota/'+ idMateria +'/' + idUsuario + '');
        }

        function consultaAusencia(idMateria, idUsuario){
            $("#contenedor").load('/estudiante/consulta_ausencia/'+ idMateria +'/' + idUsuario + '');
        }
    </script>
@endsection