<?php
/**
 * Created by PhpStorm.
 * User: adolfo
 * Date: 11/03/18
 * Time: 4:34
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];



    public function producto()
    {
        return $this->hasMany(Producto::class);
    }

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}