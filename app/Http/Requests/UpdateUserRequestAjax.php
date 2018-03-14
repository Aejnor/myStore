<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequestAjax extends FormRequest
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
        if ($this->exists('name')) {
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
        if ($this->exists('address')) {
            $rules['address'] = $this->validateAddress();
        }
        if ($this->exists('website')) {
            $rules['website'] = $this->validateWebsite();
        }
        if ($this->exists('phone')) {
            $rules['phone'] = $this->validatePhone();
        }
        if ($this->exists('about')){
            $rules['about'] = $this->validateAbout();
        }
        return $rules;
    }

    protected function failedValidation($validator)
    {
        $errores = $validator->errors();
        $response = new JsonResponse([
            'name' => $errores->get('name'),
            'surname' => $errores->get('surname'),
            'username' => $errores->get('username'),
            'email' => $errores->get('email'),
            'phone' => $errores->get('phone'),
            'website' => $errores->get('website'),
            'about' => $errores->get('about'),
            'address' => $errores->get('address'),

        ]);

        $response = new JsonResponse($errores);


        throw new ValidationException($validator, $response);
    }
}
