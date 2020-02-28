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
   <div class="col-sm-12 ">
      <h1 class="display-3">{{ $empresa->nombre_empresa}}</h1>
    <div>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <p>Nombre: {{ $empresa->nombre_empresa}}</p>
        <p>Direccion: {{ $empresa->direccion_empresa}}</p>
        <p>Telefono: {{ $empresa->telefono_empresa}}</p>
        <p>Sitio web: {{ $empresa->sitio_web}}</p>

        @if($contacto)
        <h3 class="display-3">Contactos</h1>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id='contacto'>
            <thead class="thead-dark">
              <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Celular</th>
                <th class="text-center">Email 1</th>
                <th class="text-center">Email 2</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contacto as $c)
                <tr>
                  <td>{{ $c->nombre_contacto }}</td>
                  <td>{{ $c->celular }}</td>
                  <td>{{ $c->email_principal }}</td>
                  <td>{{ $c->email_secundario }}</td>
                  <td>

                    <a class="btn btn-warning   btn-block" title="Editar"
                                     href="{{ route('contacto.edit', $c )}}">Editar</a>
                    <form method="post" action="{{action('ContactoController@destroy', $c->id_contacto)}}">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>


        @endif
    </div>
  </div>
  </div>
  <div class="row">
    <a class="btn btn-primary" title="Editar"
                     href="{{ route('empresa.edit', $empresa->id_empresa )}}">Editar empresa</a>
  </div>
  </div>
</body>
</html>
