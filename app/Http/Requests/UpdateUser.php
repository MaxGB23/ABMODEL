<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user') ? $this->route('user')->id : null;

        return [
            'name' => [
                'nullable',               // No obligatorio, ya que el usuario puede no querer cambiarlo
                'string',                 // Debe ser una cadena
                'max:255',                // Longitud máxima de 255 caracteres
            ],

            'email' => [
                'nullable',               // No obligatorio, ya que el usuario puede no querer cambiarlo
                'string',                 // Debe ser una cadena
                'email',                  // Debe ser una dirección de correo válida
                'max:255',                // Longitud máxima de 255 caracteres
                'unique:users,email,' . $userId, // Debe ser único, pero excluyendo el email del usuario que se está actualizando
            ],

            'password' => [
                'nullable',               // No obligatorio, ya que el usuario puede no querer cambiarlo
                'string',                 // Debe ser una cadena
                'min:8',                  // Longitud mínima de 8 caracteres
                'confirmed',              // Debe coincidir con el campo 'password_confirmation'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',

            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas deben coincidir.',
        ];
    }
}
