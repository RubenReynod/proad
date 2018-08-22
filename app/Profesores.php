<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Profesores extends Authenticatable
{
    // use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $primaryKey = 'codigo';
    protected $table = 'profesores';

    protected $fillable = [
        'codigo', 'nombre', 'apellidoP','apellidoM','estatus','contraseña','sexo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
