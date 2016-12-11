<table class="table table-hover table-bordered">
    <tr>
        <th>Dia</th>
        <th>Hora inicio</th>
        <th>Hora fin</th>
    </tr>

    @foreach($horarios as $horario)
        <tr>
            <td>{{ $horario->dia }}</td>
            <td>{{ $horario->hora_inicio }}</td>
            <td>{{ $horario->hora_fin }}</td>
        </tr>
    @endforeach
</table>