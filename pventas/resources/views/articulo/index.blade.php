@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('articulo.search')
  </div>
{{-- se crea una tabla para listar los datos obtenidos del controlador --}}
  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="articulo/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <th>Id</th>
                <th>Categoria</th>
                <th>Codigo</th>
                <th>Nombre </th>
                <th>Precio</th>
                <th><center>Cantidad Disponible</center></th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Opciones</th>
              </thead>
              @foreach($articulos as $art)
                <tr>
                <td>{{$art->idarticulo}}</td>
                <td>{{$art->categoria}}</td>
                <td>{{$art->codigo}}</td>
                <td>{{$art->nombre}}</td>
                  <td>Q.{{$art->precio}}</td>

                  <td><center>{{$art->stock}}</center></td>
                  <td>
                  <img src="{{asset('imagenes/articulos/'.$art->imagen)}}"alt="{{$art->nombre}}" height="100px" width="100px" class="img-thumbail">
                  </td>
                  <td>{{$art->estado}}</td>
                  <td>
                  <a href="{{ route('articulo.edit', $art->idarticulo) }}"> <button class="btn btn-info">Editar</button></a>
                   <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal">
                   <button class="btn btn-danger"> Eliminar </button></a>

                </td>

                </tr>
                @include('articulo.modal')
              @endforeach
            </table>
          </div>
          {{$articulos->render()}}
        </div>
      </div>
    </div>


@endsection
