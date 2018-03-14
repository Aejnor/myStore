<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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

        $rules['name'] = $this->validateNombre();
        $rules['surname'] = $this->validateNSurname();
        $rules['username'] = $this->validateUsername();
        $rules['email'] = $this->validateEmail();
        $rules['password'] = $this->validatePassword();

        return $rules;
    }

    public function messages()
    {
        $messageNombre = $this->messagesNombre();
        $messageEmail = $this->messagesEmail();
        $messageSurname = $this->messagesSurname();
        $messageUsername = $this->messagesUsername();
        $messagePassword = $this->messagesPassword();

        $mensajes = array_merge(
            $messageSurname,
            $messageEmail,
            $messageNombre,
            $messageUsername,
            $messagePassword
        );
        return $mensajes;
    }

    public function messagesNombre()
    {
        $message = array();
        $message['name.required'] = '¿Tendras nombre, no?';
        $message['name.max'] = 'Creo que el nombre es un poco largo ¿no crees?';
        return $message;
    }

    public function messagesPassword()
    {
        $message = array();
        $message['password.required'] = 'Necesitas tener una contraseña';
        $message['password.min'] = 'La contraseña tiene que tener minimo 6 caracteres';
        return $message;
    }

    public function messagesSurname()
    {
        $message = array();
        $message['surname.required'] = '¿No tienes apellidos?';
        $message['surname.max'] = '¿Tu apellido es muy largo, no?';
        return $message;
    }

    public function messagesUsername()
    {
        $message = array();
        $message['username.required'] = 'Necesitas ponerte un nombre de usuario';
        $message['username.max'] = 'Tu nombre de usuario es demasiado largo';
        return $message;
    }

    public function messagesEmail()
    {
        $message = array();
        $message['email.required'] = 'Necesitas poner un correo electronico';
        $message['email.max'] = 'Tu correo es demasiado largo';
        return $message;
    }

    protected function validateNombre(){
        return 'required|string|max:50';
    }

    protected function validateSurname(){
        return 'required|string|max:100';
    }

    protected function validateUsername(){
        return 'required|string|max:100';
    }

    protected function validateEmail(){
        return 'required|string|email|max:150';
    }

    protected function validatePassword(){
        return 'required|string|min:6';
    }
}
