<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenItem extends Model
{

    protected $table = 'order_items';

    protected $fillable = [
        'user_id', 'orden_id', 'product_id', 'inventory_id', 'variant_id', 'label_item', 'cantidad',
        'descuento_status','descuento', 'precio_original' ,'fecha_caduca_descuento','precio_unitario', 'total'
    ];

    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
