<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='articulo';
  protected $primaryKey='idarticulo';

  public $timestamps=false;
//se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  protected $fillable=[
    'idcategoria',
    'codigo',
    'nombre',
    'precio',
    'stock',
    'descripcion',
    'imagen',
    'estado'
  ];
}
