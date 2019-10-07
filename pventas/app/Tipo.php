<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
  protected $table='tipo_persona';
  protected $primaryKey='idtipo';

  public $timestamps=false;

  protected $fillable=[
    'nombre'
  ];
}
