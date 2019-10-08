@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('categoria.search')
  </div>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="categoria/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
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
                  <td>{{$cat->descripcion}}</td>

                  <td>
                  <a href="{{ route('categoria.edit', $cat->idcategoria) }}"> <button class="btn btn-info">Editar</button></a>
                   <a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal">
                   <button class="btn btn-danger"> Eliminar </button></a>

                </td>

                </tr>
                @include('categoria.modal')
              @endforeach
            </table>
          </div>
          {{$categorias->render()}}
        </div>
      </div>
    </div>


@endsection
