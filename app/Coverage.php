<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coverage extends Model
{
    use SoftDeletes;
    protected $table = 'coverages';

    protected $fillable = [
        'status','nombre','tipo_covertura', 'precio', 'restaurant_id', 'state_id',
        
    ];
}
