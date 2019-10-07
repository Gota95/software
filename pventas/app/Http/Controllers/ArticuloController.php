<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticuloFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
      if($request){
      $query= trim($request->get('searchText'));
      $articulos=DB::table('articulo as art')
      ->join('categoria as cat', 'art.idcategoria','=','cat.idcategoria')->select('art.idarticulo','art.codigo',
      'art.nombre','art.precio','art.stock','art.descripcion','art.imagen','art.estado',DB::raw("cat.nombre as categoria"))
      ->where('art.nombre','LIKE','%'.$query.'%')
      ->orderBy('art.idarticulo','asc')
      ->paginate(7);

      return view("articulo.index",["articulos"=>$articulos,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categorias=DB::table('categoria')->get();
      return view("articulo.create",["categorias"=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $articulo= new Articulo;
      $articulo->idarticulo=$request->get('idarticulo');
      $articulo->codigo=$request->get('codigo');
      $articulo->nombre=$request->get('nombre');
      $articulo->precio=$request->get('precio');
      $articulo->stock=$request->get('stock');
      $articulo->descripcion=$request->get('descripcion');
      $articulo->estado=$request->get('estado');

      if(Input::hasFile('imagen')){
      $file=Input::file('imagen');
      $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
      $articulo->imagen=$request->get('imagen');
      $articulo->idcategoria=$request->get('idcategoria');

      $articulo->save();

      return Redirect::to('articulo');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $articulos=DB::table('articulo as art')
    ->join('categoria as cat', 'art.idcategoria','=','cat.idcategoria')->select('art.idarticulo','art.codigo',
    'art.nombre','art.precio','art.stock','art.descripcion','art.imagen','art.estado',DB::raw("cat.nombre as categoria"))
    ->where('art.idarticulo','=',$id)->first();

    return view("articulo.show",["articulos"=>$articulos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categorias=DB::table('categoria')->get();
      return view("articulo.edit",["articulo"=>Articulo::findOrFail($id),"categorias"=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $articulo= Articulo::findOrFail($id);
      $articulo->idarticulo=$request->get('idarticulo');
      $articulo->codigo=$request->get('codigo');
      $articulo->nombre=$request->get('nombre');
      $articulo->precio=$request->get('precio');
      $articulo->stock=$request->get('stock');
      $articulo->descripcion=$request->get('descripcion');
      $articulo->estado=$request->get('estado');
      $articulo->imagen=$request->get('imagen');
      $articulo->idcategoria=$request->get('idcategoria');

      $articulo->Update();

      return Redirect::to('articulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $articulo = DB::table('articulo')->where('idarticulo', '=',$id)->delete();
    return Redirect::to('articulo');
    }
}
