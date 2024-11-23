<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
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
            'pregunta' => [
                'required',               // Obligatorio
                'string',                 // Debe ser una cadena
                'max:100',                // Longitud máxima de 100 caracteres
                'min:3',                  // Longitud mínima de 3 caracteres (opcional)
            ],

            'respuesta' => [
                'required',           // Obligatorio
                'string',             // Debe ser una cadena
                'max:255',            // Longitud máxima de 255 caracteres
                'min:3',             // Longitud mínima de 10 caracteres (opcional)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'pregunta.required' => 'La pregunta es obligatoria.',
            'pregunta.string' => 'La pregunta debe ser una cadena de texto.',
            'pregunta.max' => 'La pregunta no debe exceder los 100 caracteres.',
            'pregunta.min' => 'La pregunta debe tener al menos 3 caracteres.',

            'respuesta.required' => 'La respuesta es obligatoria.',
            'respuesta.string' => 'La respuesta debe ser una cadena de texto.',
            'respuesta.max' => 'La respuesta no debe exceder los 255 caracteres.',
            'respuesta.min' => 'La respuesta debe tener al menos 3 caracteres.',
        ];
    }
}
