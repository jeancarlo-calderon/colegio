<!-- Esta variable $errors la provee laravel -->
@if(! $errors->isEmpty())
    <div class="alert alert-danger">
        <p><strong>Ups! </strong>Por favor revise los siguientes errores:</p>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif