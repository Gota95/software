<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RProductosController;
use App\Articulo;
use DB;

class RProductosController extends Controller
{
  // funcion para obtener datos de los productos y la categoria al que pertenece
  public function imprimir(){
//se obtienen los registros de los productos
    $productos=DB::table('articulo as ar')
    ->join('categoria as cat','ar.idcategoria','=','cat.idcategoria')
    ->select('ar.codigo','ar.nombre','ar.precio','ar.stock','ar.estado',
    DB::raw('cat.nombre as categoria'))
    ->orderBy('ar.nombre','asc')
    ->get();
    //se configura y crea el archivo pdf para mostrar el reporte
    $view= \View::make('reportes.productos',compact('productos'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('productos'.'.pdf');

  }
}
