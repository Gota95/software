<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  //definimos las llavese primarias y los campos de la tabla
  protected $table='persona';
  protected $primaryKey='idpersona';

  public $timestamps=false;
  //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
  protected $fillable=[
    'idtipopersona',
    'nombre',
    'dpi',
    'direccion',
    'telefono',
    'email'
  ];
}
