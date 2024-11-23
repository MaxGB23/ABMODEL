<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'categoria' => $this->categoria,
            'descripcion' => $this->descripcion,
            'created_by' => UserResource::make($this->whenLoaded('creador')),
            'updated_by' => UserResource::make($this->whenLoaded('actualizador')),
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString()
        ];

    }
}
