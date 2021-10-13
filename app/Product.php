<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'precio' , 'descuento', 'indescuento', 'imagen_producto', 'descripcion', 'category_id'
    ];
}
