<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'nombre_razon_social', 'nombre_encargado' , 'telefono_razon_social',
        'direccion_razon_socia', 'email_razon_social'
    ];
}
