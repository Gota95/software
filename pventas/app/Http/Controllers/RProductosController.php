<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RProductosController;
use App\Articulo;
use DB;

class RProductosController extends Controller
{
  public function imprimir(){
    $productos=DB::table('articulo as ar')
    ->join('categoria as cat','ar.idcategoria','=','cat.idcategoria')
    ->select('ar.codigo','ar.nombre','ar.precio','ar.stock','ar.estado',
    DB::raw('cat.nombre as categoria'))
    ->orderBy('ar.nombre','asc')
    ->get();
    $view= \View::make('reportes.productos',compact('productos'));
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('productos'.'.pdf');

  }
}
