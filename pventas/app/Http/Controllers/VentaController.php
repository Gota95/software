<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\DetalleVenta;
use App\Http\Requests\VentaFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

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
        ->join('detalle_venta as dv','ven.idventa','=','dv.idventa')
        ->select('ven.idventa','ven.tipo_comprobante',
        'ven.serie_comprobante','ven.num_comprobante',
        'ven.fecha_hora','ven.impuesto','ven.total_venta','ven.estado',DB::raw('per.nombre as nombrecliente'))
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


      $personas=DB::table('persona')
      ->where('idtipopersona','=','2')->get();
      $articulos=DB::table('articulo as art')
      ->join('detalle_ingreso as di','art.idarticulo','=','di.idarticulo')
      ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'),
      'art.idarticulo','art.stock', DB::raw('avg(di.precio_venta) as precio_venta'))
      ->where('art.estado','=','Activo')
      ->where('art.stock','>','0')
      ->groupBy('articulo','art.idarticulo','art.stock')
      ->get();
      return view("venta.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaFormRequest $request)
    {
        $venta=new Venta;
        $venta->idventa=$request->get('idventa');
        $venta->idcliente=$request->get('idcliente');
        $venta->tipo_comprobante=$request->get('tipo_comprobante');
        $venta->serie_comprobante=$request->get('serie_comprobante');
        $venta->num_comprobante=$request->get('num_comprobante');
        $venta->total_venta=$request->get('total_venta');

        $mytime=Carbon::now('America/Lima');
        $venta->fecha_hora=$mytime->toDateTimeString();
        $venta->impuesto='0';
        $venta->estado='A';

        $venta->save();

        $idarticulo=$request->get('idarticulo');
        $cantidad=$request->get('cantidad');
        $descuento=$request->get('descuento');
        $precio_venta=$request->get('precio_venta');


        $cont=0;

        while ($cont<count($idarticulo)) {
          $detalle=new DetalleVenta();
          $detalle->idventa=$venta->idventa;
          $detalle->idarticulo=$idarticulo[$cont];
          $detalle->cantidad=$cantidad[$cont];
          $detalle->descuento=$descuento[$cont];
          $detalle->precio_venta=$precio_venta[$cont];
          $detalle->save();
          $cont=$cont+1;
        }

        DB::commit();

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
      $venta=DB::table('venta as ven')
        ->join('persona as per','ven.idcliente','=','per.idpersona')
        ->join('detalle_venta as dv',
        'ven.idventa','=','dv.idventa')
        ->select('ven.idventa','ven.tipo_comprobante',
        'ven.serie_comprobante','num_comprobante',
        'ven.fecha_hora','ven.impuesto','ven.total_venta','ven.estado')
        ->where('dv.idventa','=',$id)->first();

      $detalles=DB::table('detalle_venta as dv')
        ->join('articulo as art','dv.idarticulo','=','art.idarticulo')
        ->select('art.nombre as articulo','dv.cantidad','dv.descuento','dv.precio_venta')
        ->where('dv.idventa','=',$id)->get();

      return view("venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $venta = Venta::findOrFail($id);
      $venta->estado='C';
      $venta->update();

      return Redirect::to('venta');
    }
}
