<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $path = $this->path();
        if (strpos($path, 'account')) {

            $rules = array();

            $rules['name'] = $this->validateNombre();
            $rules['surname'] = $this->validateNSurname();
            $rules['username'] = $this->validateUsername();
            $rules['email'] = $this->validateEmail();
            $rules['phone'] = $this->validatePhone();
            $rules['address'] = $this->validateAddress();
            $rules['about'] = $this->validateAbout();
            $rules['website'] = $this->validateWebsite();


            return $rules;
        } elseif (strpos($path, 'password')) {
            $rules = [
                'current_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
            ];
        }
        return $rules;
    }


    public function messages()
    {
        $messageNombre = $this->messagesNombre();
        $messageEmail = $this->messagesEmail();
        $messageSurname = $this->messagesSurname();
        $messageUsername = $this->messagesUsername();
        $messageWebsite = $this->messagesWebsite();
        $messageAbout = $this->messagesAbout();
        $messagePhone = $this->messagesPhone();
        $messageAddress = $this->messagesAddress();

        $mensajes = array_merge(
            $messageSurname,
            $messageEmail,
            $messageNombre,
            $messageUsername,
            $messageWebsite,
            $messageAbout,
            $messagePhone,
            $messageAddress
        );
        return $mensajes;
    }


    public function messagesNombre()
    {
        $message = array();
        $message['name.max'] = 'Creo que el nombre es un poco largo ¿no crees?';
        return $message;
    }

    public function messagesAddress()
    {
        $message = array();
        $message['address.max'] = 'Tu direccion es muy larga';
        return $message;
    }

    public function messagesSurname()
    {
        $message = array();
        $message['surname.max'] = '¿Tu apellido es muy largo, no?';
        return $message;
    }

    public function messagesUsername()
    {
        $message = array();
        $message['username.max'] = 'Tu nombre de usuario es demasiado largo';
        return $message;
    }

    public function messagesEmail()
    {
        $message = array();
        $message['email.max'] = 'Tu correo es demasiado largo';
        $message['email.unique'] = 'El correo electronico ya esta registrado en nuestra base de datos';
        return $message;
    }

    public function messagesWebsite()
    {
        $message = array();
        $message['website.max'] = 'Los 70 caracteres que tenemos para la pagina web han sido pasados';
        return $message;
    }

    public function messagesPhone()
    {
        $message = array();
        $message['phone.max'] = 'Tu telefono es un poco mas largo de lo normal...';
        $message['phone.unique'] = 'El numero de telefono ya existe en nuestra base de datos';
        return $message;
    }

    public function messagesAbout()
    {
        $message = array();
        $message['about.max'] = 'Los 50 caracteres de la descripcion los has pasado';
        return $message;
    }



    protected function validateNombre()
    {
        return 'nullable|string|max:50';
    }

    protected function validateSurname()
    {
        return 'nullable|string|max:100';
    }

    protected function validateUsername()
    {
        return 'nullable|string|max:100';
    }

    protected function validateEmail()
    {
        return 'nullable|string|email|max:150';
    }

    protected function validateWebsite()
    {
        return 'nullable|string|max:70';
    }

    protected function validateAddress()
    {
        return 'nullable|string|max:60';
    }

    protected function validateAbout()
    {
        return 'nullable|string|max:50';
    }
}
