@extends ('layouts.admin')
@section ('contenido')
<div class="row">
<div class="col-lg-8 col-md-6 col-xs-12">
<center><h3>Editar Venta </h3></center>
<br>
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif


{!!Form::model($venta,['method'=>'PATCH','route'=>['venta.update',$venta->idventa], 'files'=>'true'])!!}
{{Form::token()}}

<div class="row">

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="fecha_hora">Fecha</label>
<input type="date" name="fecha_hora" class="form-control" placeholder="fecha">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
<label>Cliente</label>
<select name="idcliente" class="form-control">
@foreach ($personas as $per)
@if($per->idpersona==$venta->idpersona)
<option value="{{$per->idpersona}}" selected>{{$per->nombre}}</option>
@else
<option value="{{$per->idpersona}}">{{$per->nombre}}</option>
@endif
@endforeach
</select>
</div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="num_comprobante">No. Comprobante</label>
<input type="text" name="num_comprobante" class="form-control" placeholder="num_comprobante">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="serie_comprobante">Serie Comprobante</label>
<input type="text" name="serie_comprobante" class="form-control" placeholder="Serie">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="tipo_comprobante">Comprobante</label>
<input type="text" name="tipo_comprobante" class="form-control" placeholder="Comprobante">
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="impuesto">Impuesto</label>
<input type="text" name="impuesto" class="form-control" placeholder="impuesto">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="total_venta">Total</label>
<input type="text" name="total_venta" class="form-control" placeholder="Total">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

<div class="form-group">
<label for="estado">Estado</label>
<input type="text" name="estado" class="form-control" placeholder="Estado">
</div>
</div>


</div>
<br>
<div class="form-group">
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
<div>




{!!Form::close()!!}

</div>
</div>

@endsection