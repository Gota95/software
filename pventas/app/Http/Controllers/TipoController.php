<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use App\Http\Requests\TipoFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request){
        $query= trim($request->get('searchText'));
        $tipos=DB::table('tipo_persona as tp')
        ->select('tp.idtipo','tp.nombre')
        ->where('tp.nombre','LIKE','%'.$query.'%')
        ->orderBy('tp.nombre','asc')
        ->paginate(7);

        return view("tipo.index",["tipos"=>$tipos,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("tipo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipo=new Tipo;
      $tipo->idtipo=$request->get('idtipo');
      $tipo->nombre=$request->get('nombre');

      $tipo->save();

      return Redirect::to('tipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tipo=DB::table('tipo_persona as tp')
      ->select('tp.idtipo','tp.nombre')
      ->where('tp.idtipo','=',$id)->first();
      return view("tipo.show",["tipo"=>Tipo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view("tipo.edit",["tipo"=>Tipo::findOrFail($id)]);
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
      $tipo=Tipo::findOrFail($id);
      $tipo->nombre=$request->get('nombre');

      $tipo->Update();

      return Redirect::to('tipo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tipo = DB::table('tipo_persona')->where('idtipo','=',$id)->delete();
      return Redirect::to('tipo');
    }
}
