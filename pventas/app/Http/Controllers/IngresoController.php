<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingreso;
use App\DetalleIngreso;
use App\Http\Requests\IngresoFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class IngresoController extends Controller
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
        $ingresos=DB::table('ingreso as ing')
        ->join('persona as per','ing.idproveedor','=','per.idpersona')
        ->join('detalle_ingreso as di','ing.idingreso','=','di.idingreso')
        ->select('ing.idingreso','ing.tipo_comprobante',
        'ing.serie_comprobante','ing.num_comprobante',
        'ing.fecha_hora','ing.impuesto','ing.estado',DB::raw("per.nombre as nombreproveedor"),DB::raw('di.cantidad*di.precio_compra as total'))
        ->where('ing.num_comprobante','LIKE','%'.$query.'%')
        ->orderBy('ing.idingreso','asc')
        ->paginate(7);

        return view("ingreso.index",["ingresos"=>$ingresos,"searchText"=>$query]);
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
      ->where('idtipopersona','=','1')->get();

      $articulos=DB::table('articulo as art')
      ->select(DB::raw('CONCAT(art.codigo,"",art.nombre) AS articulo'),
      'art.idarticulo')
      ->where('art.estado','=','Activo')
      ->get();
      return view("ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngresoFormRequest $request)
    {
      DB::beginTransaction();

      $ingreso = new Ingreso;
      $ingreso->idingreso=$request->get('idingreso');
      $ingreso->idproveedor=$request->get('idproveedor');
      $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
      $ingreso->serie_comprobante=$request->get('serie_comprobante');
      $ingreso->num_comprobante=$request->get('num_comprobante');

      $mytime=Carbon::now('America/Lima');
      $ingreso->fecha_hora=$mytime->toDateTimeString();
      $ingreso->impuesto='0';
      $ingreso->estado='A';

      $ingreso->save();

      $idarticulo=$request->get('idarticulo');
      $cantidad=$request->get('cantidad');
      $precio_compra=$request->get('precio_compra');
      $precio_venta=$request->get('precio_venta');


      $cont=0;

      while ($cont<count($idarticulo)) {
        $detalle=new Detalleingreso();
        $detalle->idingreso=$ingreso->idingreso;
        $detalle->idarticulo=$idarticulo[$cont];
        $detalle->cantidad=$cantidad[$cont];
        $detalle->precio_compra=$precio_compra[$cont];
        $detalle->precio_venta=$precio_venta[$cont];
        $detalle->save();
        $cont=$cont+1;
      }

      DB::commit();

      return Redirect::to('ingreso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ingreso=DB::table('ingreso as ing')
      ->join('persona as per','ing.idproveedor','=','per.idpersona')
      ->join('detalle_ingreso as di','ing.idingreso','=','di.idingreso')
      ->select('ing.idingreso','ing.tipo_comprobante',
      'ing.serie_comprobante','ing.num_comprobante',
      'ing.fecha_hora','ing.impuesto','ing.estado',DB::raw("per.nombre as nombreproveedor"),DB::raw('di.cantidad*di.precio_compra as total'))
          ->where('ing.idingreso','=',$id)->first();

      $detalles=DB::table('detalle_ingreso as di')
      ->join('articulo as a','di.idarticulo','=','a.idarticulo')
      ->select('a.nombre as articulo','di.cantidad','di.precio_compra','di.precio_venta')
      ->where('di.idingreso','=',$id)
      ->get();

      return view("ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);
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
      $ingreso=Ingreso::findOrFail($id);
      $ingreso->estado='C';
      $ingreso->update();


      return Redirect::to('ingreso');
    }
}
