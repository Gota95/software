@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
  <br>
    <h3>Listado de Articulos <a href="categoria/create">
    <br>
    <br>
    <button>Nuevo</button></a>
    @include('articulo.search')
  </div>
</div>
<div class="container-fluid">
  <div class="col-lg-8 col-lm-12">
    <div class="card">
      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <th>Id</th>
                <th>Id Categoria</th>
                <th>Codigo </th>
                <th>Nombre </th>
                <th>Stock</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Opciones</th>
              </thead>
              @foreach($articulos as $art)
                <tr>
                  <td>{{$art->idarticulo}}</td>
                  <td>{{$art->idcategoria}}</td>
                  <td><{{$art->codigo}}</td>
                  <td><{{$art->nombre}}</td>
                  <td><{{$art->descripcion}}</td>
                  <td><{{$art->imagen}}</td>
                  <td><{{$art->estado}}</td>
                  <td>
                  <a href=""><button class="btn btn-info"> Editar </button></a>
                  <a href=""><button class="btn btn-danger"> Eliminar </button></a>

                </td>

                </tr>
              @endforeach
            </table>
          </div>
          {{$articulos->render()}}
        </div>
      </div>
    </div>
  </div>

@endsection
