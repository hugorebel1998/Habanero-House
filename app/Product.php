<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status','nombre', 'precio' , 'indescuento', 'descuento',  'imagen_producto', 'descripcion','user_id' ,'category_id'
    ];
}
