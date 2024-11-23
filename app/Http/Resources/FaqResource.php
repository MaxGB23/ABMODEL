<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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
            'pregunta' => $this->pregunta,
            'respuesta' => $this->respuesta,
            'created_by' => UserResource::make($this->whenLoaded('creador')),
            'updated_by' => UserResource::make($this->whenLoaded('actualizador')),
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString()
        ];
    }


}
