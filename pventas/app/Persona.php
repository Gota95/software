<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  protected $table='persona';
  protected $primaryKey='idpersona';

  public $timestamps=false;

  protected $fillable=[
    'idtipopersona',
    'nombre',
    'dpi',
    'direccion',
    'telefono',
    'email'
  ];
}
