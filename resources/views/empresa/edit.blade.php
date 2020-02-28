<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
<div class="container">
  <div class="row">
      <h1 class="display-3">Editar {{ $empresa->nombre_empresa }}</h1>

      <form method="post" action="{{action('EmpresaController@update', $id)}}">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
          <div class="col-sm-12">
            <div class="form-group">
                <label for="nombre">Nombre empresa:</label>
                <input type="text" class="form-control" name="nombre" value="{{ $empresa->nombre_empresa }}" required autofocus/>
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="direccion" value="{{ $empresa->direccion_empresa }}" required autofocus/>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono(max. 8 caracteres):</label>
                <input type="text" class="form-control" name="telefono" value="{{ $empresa->telefono_empresa }}" required autofocus/>
            </div>

            <div class="form-group">
                <label for="sitio_web">Sitio web(opcional):</label>
                <input type="text" class="form-control" name="sitio_web" value="{{ $empresa->sitio_web }}"/>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
  </div>

  </div>
  </div>
</body>
</html>
