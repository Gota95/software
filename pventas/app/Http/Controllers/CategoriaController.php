<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use App\Http\Controllers\Controller;
use DB;

class CategoriaController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
      if($request)
      {
        $query=trim($request->get('searchText'));
        $categorias=DB::table('categoria as cat')
        ->select('cat.idcategoria','cat.nombre','cat.descripcion','cat.condicion')
        ->where('cat.nombre','LIKE','%'.$query.'%')
        ->orderBy('cat.idcategoria','asc')
        ->paginate(7);

        return view('categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
      }
    }
    public function create()
    {
      return view("categoria.create");
    }
    public function store(CategoriaFormRequest $request)
    {
      $categoria=new Categoria;
      $categoria->idcategoria=$request->get('idcategoria');
      $categoria->nombre=$request->get('nombre');
      $categoria->descripcion=$request->get('descripcion');
      $categoria->condicion=1;
      $categoria->save();
      return Redirect::to('categoria/');

    }
    public function edit($id)
    {
      return view("categoria.edit",["categoria"=>Categoria::findOrFail($id)]);

    }

    public function show($id){
return view("categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }


    public function update(CategoriaFormRequest $request, $id)
    {
      $categoria=Categoria::findOrFail($id);
      $categoria->nombre=$request->get('nombre');
      $categoria->descripcion=$request->get('descripcion');
      $categoria->update();
      return Redirect::to('categoria/');


    }
public function destroy($id)
{
$categoria=DB::table('categoria')->Where('idcategoria', '=', $id)->delete();

return Redirect::to ('categoria/');
}

}
