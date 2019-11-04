<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Control Ventas</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Styles -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <body class="bg2">


      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
          <h3><a class="navbar-brand text-white" href="#">Sistema Ventas</a></h3>

              <h3><a href="{{'/home'}}" style="text-decoration-line: none" class="text-white"><i calss="icon-user text-primary">
              </i> Iniciar Sesión</a></h3>
        </div>
      </nav>
    </body>
</html>
