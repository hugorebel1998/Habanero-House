<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'status', 'numero_orden', 'orden_tipo', 'subtotal', 'deliver',
        'total', 'metodo_pago', 'imagen_vaucher','info_pago', 'fecha_pago',
        'user_addeerss_id', 'user_id'
    ];

    public function getItems()
    {

        return $this->hasMany(OrdenItem::class, 'orden_id', 'id')->whereNull('fecha_caduca_descuento')
            ->orWhere(
                function ($query) {
                    $query->where('fecha_caduca_descuento', '>=', date('Y-m-d'));
                }
            )->with(['getProduct']);
    }

    public function getUserAddress()
    {
        return $this->hasOne(UserAddes::class, 'id', 'user_addeerss_id');
    }

    // public function getAdderssUser()
    // {
    //     return $this->hasOne(UserAddes::class, 'id', 'user_addreess_id');
    // }

    public function getSubtotal()
    {
        // return $this->hasMany(OrdenItem::class, 'orden_id', 'id')->with(['getProduct']);
        return $this->hasMany(OrdenItem::class, 'orden_id', 'id')->whereNull('fecha_caduca_descuento')
            ->orWhere(
                function ($query) {
                    $query->where('fecha_caduca_descuento', '>=', date('Y-m-d'));
                }
            )->sum('total');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
