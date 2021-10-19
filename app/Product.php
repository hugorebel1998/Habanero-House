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

    public function categoriaProduct(){
        return $this->hasOne(Category:: class, 'id', 'category_id');
    }

    public function hetGallery(){
        return $this->hasMany(GaleryProduct::class, 'product_id', 'id');
    }
}
