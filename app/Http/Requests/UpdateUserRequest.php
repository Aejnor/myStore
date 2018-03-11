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
            $rules = [
                'name' => 'nullable|string|max:30',
                'surname' => 'nullable|string|max:40',
                'address' => 'nullable|string|max:60',
                'website' => 'nullable|string|max:70',
                'phone' => 'nullable|string|max:11|unique:users',
                'about' => 'nullable|string|max:50',
                'email' => 'nullable|string|email|max:50|unique:users'
            ];
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
        return [
            'name.max'     => 'Los 30 caracteres que tenemos para el nombre han sido pasados',
            'surname.max'  => 'Los 40 caracteres que tenemos para los apellidos han sido pasados',
            'address.max'  => 'Los 60 caracteres que tenemos para la direccion han sido pasados',
            'website.max'  => 'Los 70 caracteres que tenemos para la pagina web han sido pasados',
            'phone.max'    => 'Tu telefono es un poco mas largo de lo normal...',
            'phone.unique' => 'El numero de telefono ya existe en nuestra base de datos',
            'about.max'    => 'Los 50 caracteres de la descripcion los has pasado',
            'email.max'    => 'El correo electronico es un poco mas largo de lo normal',
            'email.unique' => 'El correo electronico ya esta registrado en nuestra base de datos',
            'current_password.required' => 'Es necesario poner la contraseña actual',
            'current_password.min' => 'La contraseña tiene que tener un minimo de 6 caracteres',
            'password.required' => 'Tienes que poner la contraseña a la que quieres cambiar',
            'password.min' => 'La contraseña que vayas a poner tiene que tener un minimo de 6 caracteres',
        ];
    }
}
