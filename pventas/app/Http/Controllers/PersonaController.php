<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Http\Requests\PersonaFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class PersonaController extends Controller
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
      $personas=DB::table('persona as per')
      ->join('tipo_persona as tp', 'per.idtipopersona','=','tp.idtipo')->select('per.idpersona','per.nombre',
      'per.dpi','per.direccion','per.telefono','per.email',DB::raw("tp.nombre as tipo"))
      ->where('per.nombre','LIKE','%'.$query.'%')
      ->orderBy('per.nombre','asc')
      ->paginate(7);

      return view("persona.index",["personas"=>$personas,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipos=DB::table('tipo_persona')->get();
      return view("persona.create",["tipos"=>$tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $persona=new Persona;
      $persona->idpersona=$request->get('idpersona');
      $persona->nombre=$request->get('nombre');
      $persona->dpi=$request->get('dpi');
      $persona->direccion=$request->get('direccion');
      $persona->telefono=$request->get('telefono');
      $persona->email=$request->get('email');
      $persona->idtipopersona=$request->get('idtipopersona');

      $persona->save();

      return Redirect::to('persona');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $persona=DB::table('persona as per')
      ->join('tipo_persona as tp', 'per.idtipopersona','=','tp.idtipo')->select('per.idpersona','per.nombre',
      'per.dpi','per.direccion','per.telefono','per.email',DB::raw("tp.nombre as tipo"))
      ->where('per.idpersona','=',$id)->first();

      return view("persona.show",["persona"=>Persona::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tipos=DB::table('tipo_persona')->get();
      return view("persona.edit",["persona"=>Persona::findOrFail($id),"tipos"=>$tipos]);
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
      $persona= Persona::findOrFail($id);
      $persona->nombre=$request->get('nombre');
      $persona->dpi=$request->get('dpi');
      $persona->direccion=$request->get('direccion');
      $persona->telefono=$request->get('telefono');
      $persona->email=$request->get('email');
      $persona->idtipopersona=$request->get('idtipopersona');

      $persona->Update();

      return Redirect::to('persona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $persona = DB::table('persona')->where('idpersona', '=',$id)->delete();
      return Redirect::to('persona');
    }
}
