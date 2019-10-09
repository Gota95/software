@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('tipo.search')
  </div>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="tipo/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <th>Id</th>
                <th>Nombre </th>
                <th>Opciones</th>
              </thead>
              @foreach($tipos as $tp)
                <tr>
                  <td>{{$tp->idtipo}}</td>
                  <td>{{$tp->nombre}}</td>
                  <td>
                  <a href="{{ route('tipo.edit', $tp->idtipo) }}"> <button class="btn btn-info">Editar</button></a>
                   <a href="" data-target="#modal-delete-{{$tp->idtipo}}" data-toggle="modal">
                   <button class="btn btn-danger"> Eliminar </button></a>

                </td>

                </tr>
                @include('tipo.modal')
              @endforeach
            </table>
          </div>
          {{$tipos->render()}}
        </div>
      </div>
    </div>


@endsection
