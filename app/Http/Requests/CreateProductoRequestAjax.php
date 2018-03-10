<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateProductoRequestAjax extends CreateProductoRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        if ($this->exists('nombre')){
            $rules['nombre'] = $this->validateNombre();
        }
        if ($this->exists('categoria')){
            $rules['categoria'] = $this->validateCategoria();
        }
        if ($this->exists('detalle')){
            $rules['detalle'] = $this->validateDetalle();
        }
        if ($this->exists('precio')){
            $rules['precio'] = $this->validatePrecio();
        }
        if ($this->exists('marca')){
            $rules['marca'] = $this->validateMarca();
        }
        return $rules;
    }

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation($validator)
    {
        $errores =  $validator->errors();
        $response = new JsonResponse([
            'nombre' => $errores->get('nombre'),
            'categoria' => $errores->get('categoria'),
            'detalle' => $errores->get('detalle'),
            'precio' => $errores->get('precio'),
            'marca' => $errores->get('marca'),

        ]);

        $response = new JsonResponse($errores);


        throw new ValidationException($validator, $response);

    }
}
