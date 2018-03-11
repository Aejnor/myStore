<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at', 'id', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relaciones del usuario


    public function productos()
    {
        return $this->hasMany(Producto::class)->latest();
    }

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }

    public function factura()
    {
        return $this->hasMany(Factura::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class)->latest();
    }
}
