<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  //definimos las llavese primarias y los campos de la tabla<?php

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
       //se colocara el nombre de cada campo de la tabla tal y como este en la base de datos
    protected $fillable = [
        'name', 'email', 'password','rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
