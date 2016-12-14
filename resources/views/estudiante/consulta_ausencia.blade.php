<table class="table table-hover table-bordered">
    <tr>
        <th>Fecha</th>
        <th>Justificada?</th>
    </tr>

    @foreach($ausencias as $ausencia)
        <tr>
            <td>{{ $ausencia->fecha }}</td>

            @if($ausencia->justificada == 1)
                <td>Si</td>
            @else
                <td>No</td>
            @endif
        </tr>
    @endforeach
</table>