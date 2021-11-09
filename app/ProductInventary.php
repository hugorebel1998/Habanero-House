<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInventary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'cantidad_inventario' , 'precio', 'limitado_inventario','inventario_minimo',
        'product_id'
    ];
}

