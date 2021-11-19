<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'status','numero_orden', 'orden_tipo', 'subtotal', 'deliver',
        'total', 'user_addeerss_id', 'user_commen', 'metodo_pago',
        'info_pago', 'fecha_pago', 'user_id'
    ];

    public function getItems()
    {
        return $this->hasMany(OrdenItem::class, 'id', 'orden_id');
    }
}
