<?php

namespace App\Http\Resources;

use App\Http\Resources\Concerns\PreservesNullResourceData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfesorResource extends JsonResource
{
    use PreservesNullResourceData;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_profesor' => $this->id_profesor,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'especialidad' => $this->especialidad,
            'matriculas' => MatriculaResource::collection($this->whenLoaded('matriculas')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
