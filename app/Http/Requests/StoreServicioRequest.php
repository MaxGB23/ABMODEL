<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicioRequest extends FormRequest
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
    public function rules()
    {
        return [
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'servicio' => 'required|string|min:3|max:25',
            'descripcion' => 'required|string|min:3|max:250',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }

    public function messages()
    {
        return [
            // Validaciones de la imagen
            'image_path.required' => 'La imagen es obligatoria.',
            'image_path.image' => 'El archivo debe ser una imagen.',
            'image_path.mimes' => 'La imagen debe estar en formato jpeg, png, jpg, gif o svg.',
            'image_path.max' => 'La imagen no debe superar los 2 MB (2048 KB).',

            // Validaciones del servicio
            'servicio.required' => 'El nombre del servicio es obligatorio.',
            'servicio.string' => 'El nombre del servicio debe ser una cadena de texto.',
            'servicio.min' => 'El nombre del servicio debe tener al menos 3 caracteres.',
            'servicio.max' => 'El nombre del servicio no debe exceder los 25 caracteres.',

            // Validaciones de la descripción
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.min' => 'La descripción debe tener al menos 3 caracteres.',
            'descripcion.max' => 'La descripción no debe exceder los 250 caracteres.',

            // Validaciones del precio
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',

            // Validaciones de la categoría
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
        ];
    }

}
