<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaq extends FormRequest
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
    public function messages(): array
    {
        return [
            'faq.required' => 'El campo "pregunta" es obligatorio.',
            'faq.string' => 'El campo "pregunta" debe ser una cadena de texto.',
            'faq.max' => 'El campo "pregunta" no puede tener más de 100 caracteres.',
            'faq.min' => 'El campo "pregunta" debe tener al menos 3 caracteres.',

            'respuesta.required' => 'El campo "descripción" es obligatorio.',
            'respuesta.string' => 'El campo "descripción" debe ser una cadena de texto.',
            'respuesta.max' => 'El campo "descripción" no puede tener más de 255 caracteres.',
            'respuesta.min' => 'El campo "descripción" debe tener al menos 10 caracteres.',
        ];
    }

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


}
