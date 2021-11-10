<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInventary extends Model
{
    use SoftDeletes;

    protected $table = 'product_inventaries';

    protected $fillable = [
        'nombre', 'cantidad_inventario' , 'precio', 'limitado_inventario','inventario_minimo',
        'product_id'
    ];

    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function getVariants()
    {
        return $this->hasMany(Variants::class, 'inventory_id', 'id');
    }
}

