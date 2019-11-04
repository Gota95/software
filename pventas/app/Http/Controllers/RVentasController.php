<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Http\Controllers\RVentasController;
use DB;


class RVentasController extends Controller
{

    public function imprimir(){
      $day = date("Y-m-d");
      $ventas=DB::table('venta as v')
      ->join('persona as per','v.idcliente','=','per.idpersona')
      ->select('v.num_comprobante','v.fecha_hora','v.total_venta',DB::raw('per.nombre as nombrecliente'))
      ->where('v.fecha_hora','>=',$day)
      ->orderBy('v.idventa','asc')
      ->get();
      $view= \View::make('reportes.Ventas',compact('ventas'));
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('ventas'.'.pdf');

    }
}
