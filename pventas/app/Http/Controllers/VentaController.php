<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Http\Requests\VentaFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class VentaController extends Controller
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
        $ventas=DB::table('venta as ven')
        ->join('persona as per','ven.idcliente','=','per.idpersona')
        ->select('ven.idventa','ven.tipo_comprobante','ven.serie_comprobante','num_comprobante',
        'fecha_hora','impuesto','total_venta','ven.estado',DB::raw('per.nombre as nombrecliente'))
        ->where('ven.num_comprobante','LIKE','%'.$query.'%')
        ->orderBy('ven.idventa','asc')
        ->paginate(7);

        return view("venta.index",["ventas"=>$ventas,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $personas=DB::table('persona')->get();
      return view("venta.create",["personas"=>$personas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $venta=new Venta;
      $venta->idventa=$request->get('idventa');
      $venta->idcliente=$request->get('idcliente');
      $venta->tipo_comprobante=$request->get('tipo_comprobante');
      $venta->serie_comprobante=$request->get('serie_comprobante');
      $venta->num_comprobante=$request->get('num_comprobante');
      $venta->impuesto=$request->get('impuesto');
      $venta->fecha_hora=$request->get('fecha_hora');
      $venta->total_venta=$request->get('total_venta');
      $venta->estado=$request->get('estado');

      $venta->save();

      return Redirect::to('venta');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view("venta.show",["venta"=>Venta::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $clientes=DB::table('persona')->get();
      return view("venta.edit",["venta"=>Venta::findOrFail($id),"clientes"=>$clientes]);
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
      $venta=Venta::findOrFail($id);
      $venta->idcliente=$request->get('idcliente');
      $venta->tipo_comprobante=$request->get('tipo_comprobante');
      $venta->serie_comprobante=$request->get('serie_comprobante');
      $venta->num_comprobante=$request->get('num_comprobante');
      $venta->impuesto=$request->get('impuesto');
      $venta->fecha_hora=$request->get('fecha_hora');
      $venta->total_venta=$request->get('total_venta');
      $venta->estado=$request->get('estado');

      $venta->Update();

      return Redirect::to('venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $venta = DB::table('venta')->where('idventa', '=',$id)->delete();
      return Redirect::to('venta');
    }
}
