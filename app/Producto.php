<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

//    protected $fillable = ['nombre','marca','precio','detalle','categoria'];

    /**
     * @var array devolvemos todos los campos que no se van a poder tocar en nuestra base de datos
     * id - Campo identificatorio autoincrementable
     * created_at - Campo para saber la hora a la que se añadio el productos a la tienda
     * updated_at - Campo para saber a que hora ha sido editado el productos
     */

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
