<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleryProduct extends Model
{
    protected $fillable = [
        'imagen', 'product_id'
    ];
}
