<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      'art.nombre','art.strock','art.descripcion','art.imagen','art.estado',DB::raw("cat.nombre as categoria"))
      ->where('art.nombre','LIKE','%'.$query.'%')
      ->orderBy('art.idarticulo','asc')
      ->paginate(7);

      return view('articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
