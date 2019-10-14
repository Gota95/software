@extends ('layouts.admin')
@section ('contenido')
<br>
  <div class="col-lg-12">
  @include('venta.search')
  </div>

  <div class="col-lg-12 col-lm-8">
    <div class="card">
      <div class="card-body">
      <h3><a href="venta/create"><button class="btn btn-primary">Nuevo</button></a></h3>
          <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
              
              <th>No. Venta</th>
                <th>Fecha</th>
                <th>Cliente </th>
                <th>Comprobante</th>
                <th>Impuesto</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Opciones</th>
              </thead>
              @foreach($ventas as $ven)
                <tr>
                  <td>{{$ven->idventa}}</td>
                  <td>{{$ven->fecha_hora}}</td>
                  <td>{{$ven->nombrecliente}}</td>
                  <td>{{$ven->tipo_comprobante.': '.$ven->serie_comprobante.'-'.$ven->num_comprobante}}</td>
                  <td>Q.{{$ven->impuesto}}</td>
                  <td>Q.{{$ven->total_venta}}</td>
                  <td>{{$ven->estado}}</td>
                

                  <td>
                  <a href="{{URL::action('VentaController@show',$ven->idventa)}}"> <button class="btn btn-primary">Detalles</button></a> 
                   <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal">
                   <button class="btn btn-danger"> Anular </button></a>

                </td>

                </tr>
                @include('venta.modal')
              @endforeach
            </table>
          </div>
          {{$ventas->render()}}
        </div>
      </div>
    </div>


@endsection
