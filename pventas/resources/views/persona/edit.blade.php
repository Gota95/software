
@extends ('layouts.admin')
@section ('contenido')
<div class="content-body">
        
<div class="row">
<div class="col-lg-8 col-md-6 col-xs-12">
<center><h3>Nueva Persona </h3></center>
<br>
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif




{!!Form::model($persona,['method'=>'PATCH','route'=>['persona.update',$persona->idpersona], 'files'=>'true'])!!}
{{Form::token()}}

<div class="row">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" class="form-control" value="{{$persona->nombre}}">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Tipo Persona</label>
<select name="idtipopersona" class="form-control">
@foreach ($tipos as $tp)
<option value="{{$tp->idtipo}}">{{$tp->nombre}}</option>
@endforeach
</select>
</div>
</div>




<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="direccion">Direccion</label>
<input type="text" name="direccion" class="form-control" value="{{$persona->direccion}}">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="dpi">DPI</label>
<input type="text" name="dpi" class="form-control" value="{{$persona->dpi}}">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="telefono">Telefono</label>
<input type="text" name="telefono" class="form-control" value="{{$persona->telefono}}">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="email">Email</label>
<input type="text" name="email" class="form-control" value="{{$persona->email}}">
</div>
</div>

</div>
<br>
<div class="form-group">
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
<div>




{!!Form::close()!!}

</div>
</div>
</div>

@endsection
