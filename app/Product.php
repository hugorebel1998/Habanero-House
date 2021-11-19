<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'status','nombre' , 'indescuento','precio' ,'descuento','fecha_caduca_descuento','codigo_producto',
         'imagen_producto', 'descripcion','user_id' ,'category_id'
    ];

    public function categoriaProduct(){
        return $this->hasOne(Category:: class, 'id', 'category_id');
    }

    public function hetGallery(){
        return $this->hasMany(GaleryProduct::class, 'product_id', 'id');
    }

    public function getInventary(){
        return $this->hasMany(ProductInventary::class , 'product_id', 'id');
    }

    public function getPrice(){
        return $this->hasMany(ProductInventary::class, 'product_id', 'id');
    }
}
