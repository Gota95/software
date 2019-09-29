@extends ('layouts.admin')
@section ('contenido')
<h3>  INDEX </h3> 
<div class="row">
<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
<h3>Listado de Categorias <a href="categoria/create"><button>Nuevo</button></a>
@include('categoria.search')
</div>
<div class="row">
<div class="col-lg-12 col-md-12 cols-sm-12 col-xs-12">
<div class="table-responsive">
<table class="table table-striped table-bordered table-consenden table-hover">
<thead>
<th>Id</th>
<th>Nombre </th>
<th>Descripcion </th>
<th>Opciones</th>
</thead>
@foreach($categorias as $cat)
<tr>
<td>{{$cat->idcategoria}}</td>
<td>{{$cat->nombre}}</td>
<td><{{$cat->descripcion}}/td>
<td>
<a href=""><button class="btn btn-info"> Editar </button></a>
<a href=""><button class="btn btn-danger"> Eliminar </button></a>

</td>

</tr>
@endforeach
</table>
</div>
{{$categorias->render()}}
</div>
</div>

@endsection