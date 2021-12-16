<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellido_paterno' , 'apellido_materno', 'fecha_nacimiento', 'telefono' ,'imagen_usuario','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAgeAttribute(){
        return Carbon::parse($this->attributes['fecha_nacimiento'])->age;
    }

    public function getAddress(){
        return $this->hasMany(UserAddes::class,'user_id', 'id')->with(['getStates', 'getCities']);
    }

    public function getAddressDefault()
    {
        return $this->hasOne(UserAddes::class, 'user_id', 'id')->where('direccion_default','1')->with(['getStates', 'getCities']);
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class,'user_id','id')->where('status','!=','0');
    }
    
}
