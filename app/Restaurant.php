<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'nombre_encargado', 'nombre_razon_social' , 'telefono_razon_social', 
        'email_razon_social', 'direccion_razon_social', 'mantenimiento','restaurante_galeria'
    ];
}
