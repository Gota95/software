{!! Form::open(array('url'=>'articulo','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
{{-- formulario para borrar un registro --}}
<div class="form-group">
  <div class="input-group">
  <input type="text" class"form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">

    <span class="input-gorup-btn">

    <button type="submit" class="btn btn-primary">Buscar  </button>
    </span>
  </div>
</div>

{{Form::close()}}
