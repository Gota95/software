@extends ('layouts.admin')
@section ('contenido')

<div class="content-body">

<div class="row">

<div class="col-lg-8 col-md-6 col-xs-12">
<h3>Nuevo Usuario</h3>

@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif

{!!Form::open(array('url'=>'users','method'=>'POST', 'autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="form-group">
<label for="name">Nombre</label>
<input type="text" name="name" class="form-control" placeholder="Nombre..">
</div>
<div class="form-group">
<label for="email">Correo</label>
<input type="email" name="email" class="form-control" placeholder="Correo">
</div>
  <div class="form-group">
  <label for="password">Contraseña</label>
  <input type="password" name="password" class="form-control" placeholder="Contraseña">
</div>
<div class="form-group">
<label for="rol">Rol</label>
<input type="text" name="rol" class="form-control" placeholder="Rol que desempeña el usuario">
<div>
<br>
<div class="form-group">
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
</div>




{!!Form::close()!!}

</div>

</div>
</div>
@endsection
