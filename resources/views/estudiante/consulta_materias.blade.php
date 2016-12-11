@extends('layout')

@section('content')
    <h3>Horarios de {{ $_SESSION['usuario']->nombre }}</h3>
    <br>

    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Aula</th>
            <th>Seleccionar</th>
        </tr>

        @foreach($materias as $materia)
        <tr>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->nivel }}</td>
            <td>{{ $materia->aula }}</td>
            <td><a data-toggle="modal" data-target="#horarios" onclick="consultaHorario({{ $materia->id_horario }})" href="#">Seleccionar</a></td>
        </tr>
        @endforeach
    </table>

    <div id="horarios" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Horarios</h4>
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
    </script>
@endsection