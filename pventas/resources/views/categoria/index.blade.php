@extends ('layouts.admin')
@section ('contenido')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
  <br>
  <h3>Carnet <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
  <br>
  @include('categoria.search')
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
    </div>
  </div>

@endsection
