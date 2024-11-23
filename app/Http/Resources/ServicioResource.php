<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicioResource extends JsonResource
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
        'servicio' => $this->servicio,
        'descripcion' => $this->descripcion,
        'precio' => $this->precio,
        'categoria_id' => new CategoriaResource($this->whenLoaded('categoria')),

        // Aquí se incluye la propiedad 'image_path'
        'image_path' => $this->image_path,

        // Relaciones: usuario que creó y actualizó el servicio
        'created_by' => new UserResource($this->whenLoaded('creador')),
        'updated_by' => new UserResource($this->whenLoaded('actualizador')),

        // Timestamps formateados
        'created_at' => $this->created_at->toFormattedDateString(),
        'updated_at' => $this->updated_at->toFormattedDateString(),
    ];
}

}
