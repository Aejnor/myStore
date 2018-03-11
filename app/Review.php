<?php
/**
 * Created by PhpStorm.
 * User: adolfo
 * Date: 11/03/18
 * Time: 4:34
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Un comentario es hecho por un cliente
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un comentario es hecho en un producto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    /**
     * Devuelve al cliente que hizo el comentario
     * @return mixed
     */
    public function DateUserWithComment()
    {
        return User::where('id', $this['user_id'])->first();
    }
}