@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('ingreso.search')
  </div>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="ingreso/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
              
              <th>No. Venta</th>
                <th>Fecha</th>
                <th>Proveedor </th>
                <th>Comprobante</th>
                <th>Impuesto</th>
                <th>Tota</th>
                <th>Estado</th>
                <th>Opciones</th>
              </thead>
              @foreach($ingresos as $ing)
                <tr>
                  <td>{{$ing->idingreso}}</td>
                  <td>{{$ing->fecha_hora}}</td>
                  <td>{{$ing->nombre}}</td>
                  <td>{{$ing->tipo_comprobante.': '.$ven->serie_comprobante.'-'.$ven->num_comprobante}}</td>
                  <td>Q.{{$ing->impuesto}}</td>
                  <td>Q.{{$ing->total}}</td>
                  <td>{{$ing->estado}}</td>
                

                  <td>
                  <a href="{{URL::action('IngresoController@show',$ing->idingreso) }}"> <button class="btn btn-primary">Detalles</button></a>
                   
                   
                   <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal">
                   <button class="btn btn-danger"> Anular </button></a>

                </td>

                </tr>
                @include('ingreso.modal')
              @endforeach
            </table>
          </div>
          {{$ingresos->render()}}
        </div>
      </div>
    </div>


@endsection