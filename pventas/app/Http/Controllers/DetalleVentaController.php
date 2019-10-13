<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleVenta;
use App\Http\Requests\DetalleVentaFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;


class DetalleVentaController extends Controller
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
        $detalleventas=DB::table('detalle_venta as dv')
        ->join('venta as ven','dv.idventa','=','ven.idventa')
        ->join('articulo as art','dv.idarticulo','=','art.idarticulo')
        ->select('dv.iddetalle_venta','dv.cantidad','dv.precio_venta','dv.descuento',
        DB::raw('ven.num_comprobante as venta'),DB::raw('art.nombre as articulo'))
        ->where('dv.iddetalle_venta','LIKE','%'.$query.'%')
        ->orderBy('dv.iddetalle','asc')
        ->paginate(7);

        return view("detalleventa.index",["detalleventas"=>$detalleventas,"searchText"=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ventas=DB::table('detalle_venta')->get();
      $articulos=DB::table('articulo')->get();

      return view("detalleventa.create",["ventas"=>$ventas,"articulos"=>$articulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $dv=new DetalleVenta;
      $dv->iddetalle_venta=$request->get('iddetalle_venta');
      $dv->idventa=$request->get('idventa');
      $dv->idarticulo=$request->get('idarticulo');
      $dv->cantidad=$request->get('cantidad');
      $dv->precio_venta=$request->get('precio_venta');
      $dv->descuento=$request->get('descuento');

      $dv->save();

      return Redirect::to('detalleventa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view("detalleventa.show",["detalleventa"=>DetalleVenta::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ventas=DB::table('detalle_venta')->get();
      $articulos=DB::table('articulo')->get();

      return view("detalleventa.edit",["ventas"=>$ventas,"articulos"=>$articulos]);
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
      $dv=DetalleVenta::findOrFail($id);
      $dv->idventa=$request->get('idventa');
      $dv->idarticulo=$request->get('idarticulo');
      $dv->cantidad=$request->get('cantidad');
      $dv->precio_venta=$request->get('precio_venta');
      $dv->descuento=$request->get('descuento');

      $dv->update();

      return Redirect::to('detalleventa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dv = DB::table('detalle_venta')->where('iddetalle_venta', '=',$id)->delete();
      return Redirect::to('detalleventa');
    }
}
