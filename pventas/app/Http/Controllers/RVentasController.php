<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Http\Controllers\RVentasController;
use DB;


class RVentasController extends Controller
{
// funcion para obtener datos de los productos y la categoria al que pertenece
    public function imprimir(){
      //se obtienen los registros de las ventas y se filtran solo las que se realizarion en el dia actual
      $day = date("Y-m-d");
      $ventas=DB::table('venta as v')
      ->join('persona as per','v.idcliente','=','per.idpersona')
      ->select('v.num_comprobante','v.fecha_hora','v.total_venta',DB::raw('per.nombre as nombrecliente'))
      ->where('v.fecha_hora','>=',$day)
      ->orderBy('v.idventa','asc')
      ->get();
          //se configura y crea el archivo pdf para mostrar el reporte
      $view= \View::make('reportes.Ventas',compact('ventas'));
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('ventas'.'.pdf');

    }
}
