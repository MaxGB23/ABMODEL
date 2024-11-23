<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicio extends FormRequest
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
            // Si no deseas cambiar la imagen, puedes omitir la validación 'required'.
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Hacemos nullable si la imagen no se va a actualizar.
            'servicio' => 'required|string|min:3|max:25',
            'descripcion' => 'required|string|min:3|max:250',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }

    public function messages()
    {
        return [
            // Mensajes para validación de imagen
            'image_path.required' => 'La imagen es obligatoria.',
            'image_path.image' => 'El archivo debe ser una imagen.',
            'image_path.mimes' => 'La imagen debe estar en formato jpeg, png, jpg, gif o svg.',
            'image_path.max' => 'La imagen no debe superar los 2 MB (2048 KB).',

            // Mensajes para validación de servicio
            'servicio.required' => 'El nombre del servicio es obligatorio.',
            'servicio.string' => 'El nombre del servicio debe ser una cadena de texto.',
            'servicio.min' => 'El nombre del servicio debe tener al menos 3 caracteres.',
            'servicio.max' => 'El nombre del servicio no debe exceder los 25 caracteres.',

            // Mensajes para validación de descripción
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.min' => 'La descripción debe tener al menos 3 caracteres.',
            'descripcion.max' => 'La descripción no debe exceder los 250 caracteres.',

            // Mensajes para validación de precio
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',

            // Mensajes para validación de categoría
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists' => 'La categoría seleccionada no es válida.',
        ];
    }

}
