<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name, // Corresponde al campo 'name' en la tabla 'users'
            'email' => $this->email, // Corresponde al campo 'email'
            'email_verified_at' => $this->email_verified_at ? $this->email_verified_at->toFormattedDateString() : null, // Fecha de verificación del correo
            'created_at' => $this->created_at->toFormattedDateString(), // Fecha de creación
            'updated_at' => $this->updated_at->toFormattedDateString(), // Fecha de actualización
            'remember_token' => $this->remember_token, // Token de recordatorio
        ];
    }
}
