<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
  //definimos las llavese primarias y los campos de la tabla<?php

  protected $table='venta';
  protected $primaryKey='idventa';

  public $timestamps=false;
  //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  protected $fillable=[
    'idcliente',
    'tipo_comprobante',
    'serie_comprobante',
    'num_comprobante',
     'fecha_hora',
     'impuesto',
     'total_venta',
     'estado'
  ];
}
