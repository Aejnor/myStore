<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Especificamos las reglas que vamos a usar en la validacion
        return [
            'nombre'    => 'required|string|min:4|max:255',
            'marca'     => 'required|string|max:255',
            'precio'    => 'required|numeric',
            'detalle'   => 'required|string|max:800',
            'categoria' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'    => 'Los productos deben de tener un nombre ¿no?',
            'nombre.max'         => 'Creo que el nombre es un poco largo ¿no crees?',
            'nombre.min'         => 'El nombre es bastante corto',
            'marca.required'     => 'Los productos deben de tener una marca ¿no?',
            'marca.max'          => 'El nombre de la marca es muy largo ¿no?',
            'precio.required'    => 'Los productos tienen un precio',
            'precio.numeric'     => 'El precio debe ser un numero',
            'detalle.required'   => 'El producto tendra especificaciones ¿no?',
            'detalle.max'        => 'El producto tiene demasiadas especificaciones',
            'categoria.required' => 'El producto necesita estar catalogado en una categoria',
            'categoria.max'      => 'La categoria es muy larga ¿no?',
        ];
    }
}
