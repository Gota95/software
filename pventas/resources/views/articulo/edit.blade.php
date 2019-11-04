@extends ('layouts.admin')
@section ('contenido')
<div class="content-body">
{{-- lectura y escritura de posibles errores en el sistema --}}
<div class="row">
<div class="col-lg-8 col-md-6 col-xs-12">
<center><h3>Editar articulo</h3></center>
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

{{-- definir metodo y el controlador que estara recibiendo --}}
{!!Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo], 'files'=>'true'])!!}
{{Form::token()}}
{{-- creamos el formulario que recibira los datos con el tipo correspondiente --}}
<div class="row">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Categoria</label>
<select name="idcategoria" class="form-control">
@foreach ($categorias as $cat)
@if($cat->idcategoria==$articulo->idcategoria)
<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
@else
<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
@endif
@endforeach
</select>
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="codigo">Codigo</label>
<input type="text" name="codigo"class="form-control" value="{{$articulo->codigo}}">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre"  class="form-control" value="{{$articulo->nombre}}">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="precio">Precio</label>
<input type="text" name="precio" class="form-control"value="{{$articulo->precio}} ">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label for="stock">Cantidad Disponible</label>
<input type="text" name="stock" class="form-control" value="{{$articulo->stock}}">
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
<input type="text" name="estado" class="form-control"value="{{$articulo->estado}}">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">

@if (($articulo->imagen)!="")
<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="150px" width="150px">
@endif

</div>
</div>

</div>

<div class="form-group">
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
<div>




{!!Form::close()!!}

</div>
</div>
</div>

@endsection
