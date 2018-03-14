<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequestAjax extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        if ($this->exists('name')){
            $rules['name'] = $this->validateNombre();
        }
        if ($this->exists('surname')){
            $rules['surname'] = $this->validateSurname();
        }
        if ($this->exists('username')){
            $rules['username'] = $this->validateUsername();
        }
        if ($this->exists('email')){
            $rules['email'] = $this->validateEmail();
        }
        return $rules;
    }

    protected function failedValidation($validator)
    {
        $errores =  $validator->errors();
        $response = new JsonResponse([
            'name' => $errores->get('name'),
            'surname' => $errores->get('surname'),
            'username' => $errores->get('username'),
            'email' => $errores->get('email'),

        ]);

        $response = new JsonResponse($errores);


        throw new ValidationException($validator, $response);

    }

}
