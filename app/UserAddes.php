<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserAddes extends Model
{
    use SoftDeletes;

    protected $table = 'user_address';

    protected $fillable = [
        'direccion_default	','nombre','calle_av', 'casa_dp','referencia','user_id','state_id', 'city_id'
    ];

    public function getStates(){  
        return $this->hasOne(Coverage::class,'id', 'state_id');
    }
    public function getCities(){
        return $this->hasOne(Coverage::class,'id', 'city_id');
    }
}
