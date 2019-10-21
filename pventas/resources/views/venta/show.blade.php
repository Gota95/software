@extends ('layouts.admin')
@section ('contenido')

<center>
<h3>Detalle de Compra</h3>
</center>
<div class="content-body">


<center>
     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6">
<div class="form-group">

</div>
</div>
</center>
<div class="row">


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label>Tipo Comprobante </label>
<p>{{$venta->tipo_comprobante}} </p>
</div>
</div>

<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label for="serie_comprobante">Serie Comprobante</label>
<p>{{$venta->serie_comprobante}} </p>
</div>
</div>


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
<div class="form-group">
<label for="num_comprobante">No.Comprobante</label>
<p>{{$venta->num_comprobante}} </p>
</div>
</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
</div>
<table id="detalles" class= "table table-striped table-bordered table-condensed table-hover">
<thead style="background-color: #c3f3ea">
<th>Aticulo</th>
<th>Cantidad</th>
<th>Precio Venta</th>
<th>Precio Descuento</th>
<th>Subtotal</th>

</thead>
<tfoot>


<th></th>
<th></th>
<th></th>
<th></th>
<th><h4 id="total">TOTAL Q.{{$venta->total_venta}}</h4></th>
</tfoot>
<tbody>
@foreach($detalles as $d)
<tr>

<th>{{$d->articulo}}</th>
<th>{{$d->cantidad}}</th>
<th>{{$d->precio_venta}}</th>
<th>{{$d->descuento}}</th>
<th>{{($d->cantidad*$d->precio_venta)-$d->descuento}}</h4></th>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>


</div>
 @endsection
</div>
