<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Colegio Elias Leiva</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
        body {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        hr {
            border-width: 2px;
            border-color: dimgray;
        }
    </style>

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <center>
                    <div class="col-md-12">
                        <img src="../imagenes/logoColegio.png" style="height: 130px; width: 130px; ">
                    </div>
                </center>
            </div>

            <hr>

            <div class="row">
                <h4 style="text-align: center"><span class="label label-default">MENU PRINCIPAL</span></h4>

                {{--Si el usuario esta logueado muestra el menu--}}
                @if( isset($_SESSION['usuario']) )

                    {{--El usuario es administrador--}}
                    @if($_SESSION['usuario']->id_tipo_usuario == 1)
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation" class="active"><a href="{{ url('/') }}">Inicio</a></li>
                            <li role="presentation" class="active"><a href="{{ url('admin/registrar_usuario') }}">Registrar usuario</a></li>
                            <li role="presentation" class="active"><a href="{{ url('admin/registrar_materia') }}">Registrar asignatura</a></li>
                            <li role="presentation" class="active"><a href="{{ url('admin/registrar_matricula') }}">Matricular alumno</a></li>
                            <li role="presentation" class="active"><a href="{{ url('admin/listar_usuarios') }}">Dar de baja usuario</a></li>
                            <li role="presentation" class="active"><a href="{{ url('admin/listar_materia') }}">Dar de baja asignatura</a></li>
                            <li role="presentation" class="active"><a href="{{ url('admin/modificar_usuario') }}">**Modificar usuario</a></li>
                            <li role="presentation" class="active"><a href="{{ url('/') }}">**Modificar asignatura</a></li>
                        </ul>
                    </div>
                    @endif

                    {{--El usuario es profesor--}}
                    @if($_SESSION['usuario']->id_tipo_usuario == 2)
                        <div class="col-md-12">
                            <ul class="nav nav-pills nav-stacked">
                                <li role="presentation" class="active"><a href="{{ url('/') }}">Inicio</a></li>
                                <li role="presentation" class="active"><a href="{{ url('/') }}">**Listar alumnos</a></li>
                                <li role="presentation" class="active"><a href="{{ url('/') }}">**Listar profesores</a></li>
                                <li role="presentation" class="active"><a href="{{ url('/') }}">**Poner notas</a></li>
                                <li role="presentation" class="active"><a href="{{ url('/') }}">**Poner ausencias</a></li>
                                <li role="presentation" class="active"><a href="{{ url('/') }}">**Modificar notas</a></li>
                                <li role="presentation" class="active"><a href="{{ url('/') }}">**Modificar ausencias</a></li>
                                <li role="presentation" class="active"><a href="{{ url('/') }}">**Listar ausencias</a></li>
                            </ul>
                        </div>
                    @endif

                    {{--El usuario es estudiante/padre--}}
                    @if($_SESSION['usuario']->id_tipo_usuario == 3)
                        <div class="col-md-12">
                            <ul class="nav nav-pills nav-stacked">
                                <li role="presentation" class="active"><a href="{{ url('/') }}">Inicio</a></li>
                                <li role="presentation" class="active"><a href="{{ url('estudiante/lista_companeros') }}">Consulta de companeros</a></li>
                                <li role="presentation" class="active"><a href="{{ url('estudiante/consulta_materias') }}">Consulta de materias (horarios, notas y ausencias)</a></li>
                                <li role="presentation" class="active"><a href="{{ url('estudiante/lista_profesores') }}">Lista profesores</a></li>
                            </ul>
                        </div>
                    @endif
                @else
                    <center>
                        <br>
                        <h4>Debe iniciar sesión para ver el menú</h4>
                    </center>
                @endif
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    @if( isset($_SESSION['usuario']) )
                        <center>
                            <h3>Bienvenido {{ $_SESSION['usuario']->nombre }}!!</h3>

                            <a href="{{ url('sesion/cerrar') }}">CERRAR SESSION</a>
                        </center>
                    @else
                        <h4>Iniciar sesión</h4>

                        <!-- Funcion de blade, muesta el partial view llamado errors.blade.php que esta en la carpeta partials -->
                        @include('partials/errors')

                        <form method="post" action="{{url('sesion/iniciar')}}" class="form">
                        {{csrf_field()}} <!-- Cross site request forgery / falsificacion de peticion en sitios cruzados -->

                            <div class="form-group">
                                <input type="text" name="usuario" class="form-control" placeholder="Digite el nombre de usuario"
                                       value="{{ old('usuario') }}">
                            </div>

                            <div class="form-group">
                                <input type="password" name="contrasena" class="form-control" placeholder="Digite la contraseña"
                                       value="">
                            </div>

                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @yield('content')

        </div>
    </div>
</div>

{{--FOOTER--}}
<center>
    <hr>
    <p>&copy;Moddle Colegio Elias Leiva Quiros - 2016</p>
</center>
{{--END FOOTER--}}

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>