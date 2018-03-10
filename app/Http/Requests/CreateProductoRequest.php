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
        $rules = array();

        $rules['nombre'] = $this->validateNombre();
        $rules['categoria'] = $this->validateCategoria();
        $rules['precio'] = $this->validatePrecio();
        $rules['detalle'] = $this->validateDetalle();
        $rules['marca'] = $this->validateMarca();


        // Especificamos las reglas que vamos a usar en la validacion
        return $rules;
    }



    /**
     * @return array de todos los mensajes
     */
    public function messages() {
        $messagesNombre = $this->messagesNombre();
        $messagesCategoria = $this->messagesCategoria();
        $messagesPrecio = $this->messagesPrecio();
        $messagesDetalle = $this->messagesDetalle();
        $messagesMarca = $this->messagesMarca();
        $mensajes = array_merge(
            $messagesNombre,
            $messagesCategoria,
            $messagesPrecio,
            $messagesDetalle,
            $messagesMarca
        );
        return $mensajes;
    }

    public function messagesNombre()
    {
        $message = array();
        $message['nombre.required'] = 'Los productos deben tener un nombre ¿no?';
        $message['nombre.max'] = 'Creo que el nombre es un poco largo ¿no crees?';
        $message['nombre.min'] = 'El nombre es bastante corto';

        return $message;
    }

    public function messagesMarca()
    {
        $message = array();
        $message['marca.required'] = 'Los productos deben de tener una marca ¿no?';
        $message['marca.max'] = 'El nombre de la marca es muy largo ¿no?';

        return $message;
    }

    public function messagesPrecio()
    {
        $message = array();
        $message['precio.required'] = 'Los productos tienen un precio';
        $message['precio.numeric'] = 'El precio debe ser un numero';
        $message['precio.min'] = 'El precio debe tener al menos 1 cifra';

        return $message;
    }

    public function messagesDetalle()
    {
        $message = array();
        $message['detalle.required'] = 'El producto tendra especificaciones ¿no?';
        $message['detalle.max'] = 'El producto tiene demasiadas especificaciones';
        return $message;
    }


    public function messagesCategoria()
    {
        $message = array();
        $message['categoria.required'] = 'El producto necesita estar catalogado en una categoria';
        $message['categoria.max'] = 'La categoria es muy larga ¿no?';
        return $message;
    }


    protected function validateNombre() {
        return 'required|String|max:40';
    }

    protected function validateCategoria() {
        return 'required|String|max:60';
    }

    protected function validateDetalle() {
        return 'required|String|max:400';
    }

    protected function validatePrecio() {
        return 'required|Numeric|min:1';
    }

    protected function validateMarca() {
        return 'required|String|max:80';
    }


}