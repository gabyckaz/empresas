

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
  <div class="col-md-8 col-md-offset-2">
    <a href="{{route('empresa.create')}}" class="btn btn-primary" > Agregar nueva empresa  </a>
  </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-warning">
      <div class="box-body">

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id='empresa'>
            <thead class="thead-dark">
              <tr>
                <th class="text-center">Nombre de Empresa</th>
                <th class="text-center">Dirección</th>
                <th class="text-center">Teléfono</th>
                <th class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($empresa as $e)
                <tr>
                  <td>{{ $e->nombre_empresa }}</td>
                  <td>{{ $e->direccion_empresa }}</td>
                  <td>{{ $e->telefono_empresa }}</td>
                  <td>
                    <a class="btn btn-warning   btn-block" title="Ver"
                                     href="{{ route('empresa.show', $e )}}">Ver más</a>

                    <a class="btn btn-warning   btn-block" title="Editar"
                                     href="{{ route('empresa.edit', $e )}}">Editar</a>
                    <form method="post" action="{{action('EmpresaController@destroy', $e->id_empresa)}}">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <a class="btn btn-primary" title="Agregar contacto"
                           href="{{ route('contacto.create' )}}">Agregar nuevo contacto</a>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</body>
</html>
