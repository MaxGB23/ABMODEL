<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContacto extends FormRequest
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
        return [
            'nombre' => [
                'required',  // Obligatorio
                'string',    // Debe ser texto
                'max:100',   // Longitud máxima de 100 caracteres
                'min:3',     // Longitud mínima de 3 caracteres
            ],
            'correo' => [
                'required',  // Obligatorio
                'email',     // Formato de correo válido
                'max:150',   // Longitud máxima de 150 caracteres
            ],
            'telefono' => [
                'required',  // Obligatorio
                'string',    // Debe ser texto
                'digits:10',          // Debe tener exactamente 10 dígitos
            ],
            'asunto' => [
                'required',  // Obligatorio
                'string',    // Debe ser texto
                'max:100',   // Longitud máxima de 100 caracteres
            ],
            'mensaje' => [
                'required',  // Obligatorio
                'string',    // Debe ser texto
                'max:500',   // Longitud máxima de 500 caracteres
                'min:10',    // Longitud mínima de 10 caracteres
            ],
            'status' => [
                'required',  // Obligatorio
                'in:pendiente,atendido', // Solo acepta estos valores
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 100 caracteres.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',

            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo debe tener un formato válido.',
            'correo.max' => 'El correo no debe exceder los 150 caracteres.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',

            'asunto.required' => 'El asunto es obligatorio.',
            'asunto.string' => 'El asunto debe ser una cadena de texto.',
            'asunto.max' => 'El asunto no debe exceder los 100 caracteres.',

            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.string' => 'El mensaje debe ser una cadena de texto.',
            'mensaje.max' => 'El mensaje no debe exceder los 500 caracteres.',
            'mensaje.min' => 'El mensaje debe tener al menos 10 caracteres.',

            'status.required' => 'El estado es obligatorio.',
            'status.in' => 'El estado debe ser "pendiente" o "atendido".',
        ];
    }
}
