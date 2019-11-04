@extends ('layouts.admin')
@section ('contenido')
<div class="content-body">

<div class="row">
<div class="col-lg-8 col-md-6 col-xs-12">
<center><h3>Nuevo articulo</h3></center>
<br>
{{-- lectura y escritura de posibles errores en el sistema --}}
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif

{{-- definir metodo y el controlador que estara recibiendo --}}
{!!Form::open(array('url'=>'articulo','method'=>'POST', 'autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
{{-- creamos el formulario que recibira los datos con el tipo correspondiente --}}
<div class="row">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Categoria</label>
<select name="idcategoria" class="form-control">
@foreach ($categorias as $cat)
<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
@endforeach
</select>
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="codigo">Codigo</label>
<input type="text" name="codigo" class="form-control" placeholder="Codigo">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" class="form-control" placeholder="Nombre">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="precio">Precio</label>
<input type="text" name="precio" class="form-control" placeholder="Precio">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="stock">Cantidad Disponible</label>
<input type="text" name="stock" class="form-control" placeholder="Cantidad">
</div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="imagen">Imagen</label>
<input type="file" name="imagen" class="form-control" >
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="estado">Estado</label>
<input type="text" name="estado" class="form-control" placeholder="Estado">
</div>
</div>


</div>

<br>
{{-- botones de submit y/o cancelar --}}
<div class="form-group">
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
<div>




{!!Form::close()!!}
</div>
</div>
</div>

@endsection
