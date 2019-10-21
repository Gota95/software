@extends ('layouts.admin')
@section ('contenido')

<center>
<h3>Detalle de Usuario</h3>
</center>
<div class="content-body">


<center>
     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
<div class="form-group">

</div>
</div>
</center>
<div class="row">


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label>Nombre</label>
<p>{{$usuario->name}} </p>
</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label>Correo</label>
<p>{{$usuario->email}} </p>
</div>
</div>


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label>rol</label>
<p>{{$usuario->rol}} </p>
</div>
</div>

</div>


</div>
 @endsection
