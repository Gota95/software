<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='categoria';
  protected $primaryKey='idcategoria';

  public $timestamps=false;
  //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  protected $fillable=[
    'nombre',
    'descripcion',
    'condicion'
  ];
}
