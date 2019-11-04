<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='detalle_ingreso';
  protected $primaryKey='iddetalle_ingreso';

  public $timestamps=false;
  //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  protected $fillable=[
    'idingreso',
    'idarticulo',
    'cantidad',
    'precio_compra',
    'precio_venta'
  ];
}
