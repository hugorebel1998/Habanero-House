<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'nombre_encargado', 'nombre_razon_social' , 'telefono_razon_social', 
        'email_razon_social','monto_minimo_de_compra','direccion_razon_social', 'mantenimiento',
        'restaurante_galeria','precio_envio', 'valor_por_defecto', 'cantidad_de_envio_min',
        'metodo_por_efectivo','metodo_por_paypal','whatsapp','facebook', 'instagram','twitter','youtube'
    ];
}
