<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
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
            'categoria.required' => 'El campo "categoría" es obligatorio.',
            'categoria.string' => 'El campo "categoría" debe ser una cadena de texto.',
            'categoria.max' => 'El campo "categoría" no puede tener más de 100 caracteres.',
            'categoria.min' => 'El campo "categoría" debe tener al menos 3 caracteres.',
            'categoria.unique' => 'La categoría ya está registrada.',
            'categoria.regex' => 'El campo "categoría" solo puede contener letras, números, espacios y guiones.',

            'descripcion.required' => 'El campo "descripción" es obligatorio.',
            'descripcion.string' => 'El campo "descripción" debe ser una cadena de texto.',
            'descripcion.max' => 'El campo "descripción" no puede tener más de 255 caracteres.',
            'descripcion.min' => 'El campo "descripción" debe tener al menos 10 caracteres.',
        ];
    }

    public function rules(): array
    {
        return [
            'categoria' => [
                'required',               // Obligatorio
                'string',                 // Debe ser una cadena
                'max:100',                // Longitud máxima de 100 caracteres
                'min:3',                  // Longitud mínima de 3 caracteres (opcional)
                'unique:categorias',      // Debe ser único en la tabla 'categorias' (opcional)

            ],

            'descripcion' => [
                'required',           // Obligatorio
                'string',             // Debe ser una cadena
                'max:255',            // Longitud máxima de 255 caracteres
                'min:10',             // Longitud mínima de 10 caracteres (opcional)
                'regex:/^[\w\s\.,\-]+$/u', // Permite letras, números, espacios, puntos, comas y guiones
            ],
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'categoria' => 'categoria categoria',
    //         'descripcion' => 'categoria descripcion',
    //     ];
    // }
}
