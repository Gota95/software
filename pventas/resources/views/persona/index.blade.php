@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('persona.search')
  </div>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="persona/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <th>Id</th>
                <th>Tipo Persona</th>
                <th>Nombre </th>
                <th>DPI</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Opciones</th>
              </thead>
              @foreach($personas as $per)
                <tr>
                <td>{{$per->idpersona}}</td>
                <td>{{$per->tipo}}</td>
                <td>{{$per->nombre}}</td>
                <td>{{$per->dpi}}</td>
                <td>{{$per->direccion}}</td>
                <td>{{$per->telefono}}</td>
                <td>{{$per->email}}</td>
          
                  <td>
                  <a href="{{ route('persona.edit', $per->idpersona) }}"> <button class="btn btn-info">Editar</button></a>
                   <a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal">
                   <button class="btn btn-danger"> Eliminar </button></a>

                </td>

                </tr>
                @include('persona.modal')
              @endforeach
            </table>
          </div>
          {{$personas->render()}}
        </div>
      </div>
    </div>


@endsection
