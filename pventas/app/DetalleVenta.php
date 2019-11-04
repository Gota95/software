<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='detalle_venta';
  protected $primaryKey='iddetalle_venta';

  public $timestamps=false;
  //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  protected $fillable=[
    'idventa',
    'idarticulo',
    'cantidad',
    'precio_venta',
    'descuento'
  ];
}
