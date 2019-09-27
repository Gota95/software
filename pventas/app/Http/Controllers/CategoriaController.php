<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
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
        $query=trim($request->get('serchText'));
        $categorias=DB::table('categoria as cat')
        ->select('cat.nombre','cat.descripcion','cat.condicion')
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
      $categoria->condicion=$request->get('condicion');

      $categoria->save();

      return Redirect::to('categoria/');

    }
    public function edit($id)
    {

    }
}
