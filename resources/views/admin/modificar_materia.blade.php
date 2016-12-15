<br>

<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <h3>Modificar del materia</h3>


        <form method="post" action="{{url('admin/modificar_materia')}}" class="form">
        {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="{{ $materia[0]->id }}">
            </div>

            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre del usuario"
                       value="{{ $materia[0]->nombre }}">
            </div>

            <div class="form-group">
                <input type="text" name="apellidos" class="form-control" placeholder="Digite los apellidos del usuario"
                       value="{{ $usuario[0]->apellidos }}">
            </div>

            <div class="form-group">
                <input type="text" name="correo" class="form-control" placeholder="Digite el correo del usuario"
                       value="{{ $usuario[0]->correo }}">
            </div>

            <div class="form-group">
                <input type="text" name="usuario" class="form-control" placeholder="Digite el usuario"
                       value="{{ $usuario[0]->usuario }}">
            </div>

            <div class="form-group">
                <input type="password" name="contrasena" class="form-control"
                       placeholder="Digite la contrasena del usuario"
                       value="{{ $usuario[0]->contrasena }}">
            </div>

            <h3>Listado de horarios</h3>

            <div class="form-group">
                <label for="tipo">Horario:</label>
                <select name="id_horario" class="form-control" id="id_horario">
                    @foreach($horario as $h)
                        <li>
                            @if($materia[0]->id_tipo_usuario == $h->id)
                                <option value="{{ $h->id }}" selected>{{ $h->nombre }}</option>
                            @else
                                <option value="{{ $h->id }}">{{ $h->nombre }}</option>
                            @endif
                        </li>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="text" name="nivel" class="form-control" placeholder="Digite el nivel de la materia"
                       value="{{ $materia[0]->nivel }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</div>