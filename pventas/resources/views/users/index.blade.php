@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('venta.search')
  </div>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="users/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>

                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Opciones</th>
              </thead>
              @foreach($usuarios as $us)
                <tr>
                  <td>{{$us->name}}</td>
                  <td>{{$us->email}}</td>
                  <td>{{$us->rol}}</td>
                  <td>
                  <a href="{{URL::action('UsersController@show',$us->id)}}"> <button class="btn btn-primary">Detalles</button>
                  </a>
                  <a href="{{URL::action('UsersController@edit',$us->id)}}"> <button class="btn btn-warning">Editar</button>
                  </a>
                   <a href="" data-target="#modal-delete-{{$us->id}}" data-toggle="modal">
                   <button class="btn btn-danger"> Anular </button></a>
                </td>

                </tr>
                @include('users.modal')
              @endforeach
            </table>
          </div>
          {{$usuarios->render()}}
        </div>
      </div>
    </div>


@endsection
