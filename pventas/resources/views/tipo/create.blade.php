@extends ('layouts.admin')
@section ('contenido')
<div class="content-body">
        

<div class="row">

<div class="col-lg-8 col-md-6 col-xs-12">
<h3>Nuevo tipo</h3>

@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}} </li>
@endforeach
</ul>
</div>
@endif

{!!Form::open(array('url'=>'tipo','method'=>'POST', 'autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" class="form-control" placeholder="Nombre..">
<div>
<br>
<div class="form-group">
<button class="btn btn-primary" type="submit"> Guardar </button>
<button class="btn btn-danger" type="reset"> Cancelar </button>
<div>




{!!Form::close()!!}

</div>

</div>
</div>
@endsection