<br>

<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <h3>Modificar del usuario</h3>


        <form method="post" action="{{url('admin/modificar_usuario')}}" class="form">
        {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="{{ $usuario[0]->id }}">

                <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre del usuario"
                       value="{{ $usuario[0]->nombre }}">
                <br>
                <input type="text" name="apellidos" class="form-control" placeholder="Digite los apellidos del usuario"
                       value="{{ $usuario[0]->apellidos }}">
                <br>
                <input type="text" name="correo" class="form-control" placeholder="Digite el correo del usuario"
                       value="{{ $usuario[0]->correo }}">
                <br>
                <input type="text" name="usuario" class="form-control" placeholder="Digite el usuario"
                       value="{{ $usuario[0]->usuario }}">
                <br>
                <input type="password" name="contrasena" class="form-control" placeholder="Digite la contrasena del usuario"
                       value="{{ $usuario[0]->contrasena }}">
                <br>
                <h3>Listado de tipos de usuario</h3>

                <div class="form-group">
                    <label for="tipo">Tipo de Usuario:</label>
                    <select name="id_tipo_usuario" class="form-control" id="tipo_usuario">
                        @foreach($tipoUsuario as $tipo)
                            <li>
                                @if($usuario[0]->id_tipo_usuario == $tipo->id)
                                    <option value="{{ $tipo->id }}" selected>{{ $tipo->nombre }}</option>
                                @else
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endif
                            </li>
                        @endforeach
                    </select>
                </div>
                <br>
                <input readonly="1" type="text" name="id_colegio" class="form-control" placeholder="Digite el id del colegio"
                       value="{{ $usuario[0]->id_colegio }}">
                <br>
                <input type="text" name="nivel" class="form-control" placeholder="Digite el nivel del usuario"
                       value="{{ $usuario[0]->nivel }}">
                <br>

            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</div>