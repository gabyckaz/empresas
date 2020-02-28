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
    <h1 class="display-3">Agregar nuevo contacto</h1>
    <form method="post" action="{{ route('contacto.store') }}">
        @csrf

      <div class="col-sm-12">

              <div class="form-group">
                <label for="id_empresa">Empresa</label>
                <select class="form-control" name="id_empresa">
                  @foreach($empresa as $e)
                    <option value="{{ $e->id_empresa }}">{{ $e->nombre_empresa }}</option>
                  @endforeach
                </select>
              </div>

           <div class="form-group">
               <label for="nombre_contacto">Nombre de contacto:</label>
               <input type="text" class="form-control" name="nombre_contacto" required autofocus/>
           </div>

           <div class="form-group">
               <label for="celular">Celular de contacto(max. 8 caracteres):</label>
               <input type="text" class="form-control" name="celular" required autofocus/>
           </div>

           <div class="form-group">
               <label for="email_principal">Email de contacto:</label>
               <input type="email" class="form-control" name="email_principal" required autofocus/>
           </div>

           <div class="form-group">
               <label for="email_secundario">Email alternativo de contacto(opcional):</label>
               <input type="email" class="form-control" name="email_secundario"/>
           </div>


      </div>

     <button type="submit" class="btn btn-primary">Agregar</button>
  </form>
  </div>
</div>
</body>
</html>
