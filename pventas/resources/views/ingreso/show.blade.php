@extends ('layouts.admin')
@section ('contenido')



<div class="row">
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
<div class="form-group">
<label for="fecha_hora">Fecha</label>
<input type="date" name="fecha_hora" class="form-control" placeholder="fecha">
</div>
</div>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<div class="form-group">
<label>Proveedor</label>
<p>{{$ingreso->nombre}} </p>
</div>
</div>



<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

<div class="form-group">
<label>Tipo Comprobante </label>
<p>{{$ingreso->tipo_comprobante}} </p>
</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

<div class="form-group">
<label for="serie_comprobante">Serie Comprobante</label>
<p>{{$ingreso->serie_comprobante}} </p>
</div>
</div>


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

<div class="form-group">
<label for="num_comprobante">No.Comprobante</label>
<p>{{$ingreso->num_comprobante}} </p>
</div>
</div>

</div>
</div>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
</div>
<table id="detalles" class= "table table-striped table-bordered table-condensed table-hover">
<thead style="background-color: #c3f3ea">
<th>Aticulo</th>
<th>Cantidad</th>
<th>Precio Compra</th>
<th>Precio Venta</th>
<th>Subtotal</th>

</thead>
<tfoot> 
<th></th>
<th></th>
<th></th>
<th></th>
<th><h4 id="total">{{$ingreso->total}}</h4></th>

</tfoot>
<tbody> 
@foreach($detalles as $det)
<tr>



</tr>
@endforeach
</tbody>
</table>
</div>

</div>


</div>


         @endsection