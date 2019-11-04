<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticuloFormRequest;
use Illuminate\Http\UploadedFile;
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

    //funcion donde se muestra el listado de articulos
    public function index(Request $request)
    {
      // se obtiene los articulos y la categoria al que pertenece
      if($request){
      $query= trim($request->get('searchText'));
      $articulos=DB::table('articulo as art')
      ->join('categoria as cat', 'art.idcategoria','=','cat.idcategoria')->select('art.idarticulo','art.codigo',
      'art.nombre','art.precio','art.stock','art.descripcion','art.imagen','art.estado',DB::raw("cat.nombre as categoria"))
      ->where('art.nombre','LIKE','%'.$query.'%')
      ->orderBy('art.idarticulo','asc')
      ->paginate(7);
      // se retorna  la vista a mostrar y en una variable los articulos
      return view("articulo.index",["articulos"=>$articulos,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //funcion para crear un nuevo articulo`
    public function create()
    {
      //se obtiene la tabla categoria y se llama la vista que se mostrara
      $categorias=DB::table('categoria')->get();
      return view("articulo.create",["categorias"=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     //funcion que guarda en la base de datos la informacion obtenida del formulario
    public function store(Request $request)
    {
      //se obtienen los datos enviados desde el formulario creando asi un nuevo articulo
      $articulo= new Articulo;
      $articulo->idarticulo=$request->get('idarticulo');
      $articulo->codigo=$request->get('codigo');
      $articulo->nombre=$request->get('nombre');
      $articulo->precio=$request->get('precio');
      $articulo->stock=$request->get('stock');
      $articulo->descripcion=$request->get('descripcion');
      $articulo->estado=$request->get('estado');

      //en este caso se obtiene una imagen que sera guardado dentro de una carpeta en el servidor
      if($request->hasFile('imagen')){
      $file=$request->imagen;
      $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
      $articulo->imagen=$file->getClientOriginalName();
      }
      $articulo->idcategoria=$request->get('idcategoria');
      $articulo->save();

      //se redirecciona al index donde se listan todos los articulos
      return Redirect::to('articulo/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //funcion que permite mostrar un articulo en especifico
    public function show($id)
    {
      //se realiza la consulta en la base de datos
    $articulos=DB::table('articulo as art')
    ->join('categoria as cat', 'art.idcategoria','=','cat.idcategoria')->select('art.idarticulo','art.codigo',
    'art.nombre','art.precio','art.stock','art.descripcion','art.imagen','art.estado',DB::raw("cat.nombre as categoria"))
    ->where('art.idarticulo','=',$id)->first();
    //se retorna la vista y el articulo en una variable
    return view("articulo.show",["articulos"=>$articulos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //funcion que muestra el formulario para editar un articulo
    public function edit($id)
    {
      // se envia la tabla categoria para enlazarla con los articulos
      $categorias=DB::table('categoria')->get();
      //retornamos la vista y los datos del articulo en una variable
      return view("articulo.edit",["articulo"=>Articulo::findOrFail($id),"categorias"=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //funcion que obtiene todos los cambios y
    public function update(Request $request, $id)
    {
      //obtenemos el articulo a modificar y los datos nuevos
      $articulo= Articulo::findOrFail($id);
      $articulo->codigo=$request->get('codigo');
      $articulo->nombre=$request->get('nombre');
      $articulo->precio=$request->get('precio');
      $articulo->stock=$request->get('stock');
      $articulo->descripcion=$request->get('descripcion');
      $articulo->estado=$request->get('estado');
      $articulo->imagen=$request->get('imagen');
      $articulo->idcategoria=$request->get('idcategoria');
      if($request->hasFile('imagen')){
      $file=$request->imagen;
      $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
      $articulo->imagen=$file->getClientOriginalName();
      }
      $articulo->Update();
      //retornamos a la vista index donde se listan todos los articulos
      return Redirect::to('articulo/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //funcion que elimina un articulo
    public function destroy($id)
    {
      //obtenemos el articulo para despues eliminarla
      $articulo = DB::table('articulo')->where('idarticulo', '=',$id)->delete();
      //retornamos a la vista donde se listan los articulos
    return Redirect::to('articulo/');
    }
}
