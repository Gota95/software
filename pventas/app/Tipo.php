<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='tipo_persona';
  protected $primaryKey='idtipo';
  //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  public $timestamps=false;

  protected $fillable=[
    'nombre'
  ];
}
