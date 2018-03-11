<?php
/**
 * Created by PhpStorm.
 * User: adolfo
 * Date: 11/03/18
 * Time: 4:34
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{

    protected $guarded = [
        'created_at', 'id', 'updated_at',
    ];

    public function producto()
    {
        return $this->hasMany(Producto::class);
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}