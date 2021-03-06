<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='ingreso';
  protected $primaryKey='idingreso';

  public $timestamps=false;
  //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  protected $fillable=[
    'idproveedor',
    'tipo_comprobante',
    'serie_comprobante',
    'num_comprobante',
    'fecha_hora',
    'impuesto',
    'estado'
  ];
}
