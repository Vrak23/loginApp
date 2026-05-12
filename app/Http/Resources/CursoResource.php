<?php

namespace App\Http\Resources;

use App\Http\Resources\Concerns\PreservesNullResourceData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
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
            'id_curso' => $this->id_curso,
            'nombre_curso' => $this->nombre_curso,
            'codigo_curso' => $this->codigo_curso,
            'creditos' => $this->creditos,
            'descripcion' => $this->descripcion,
            'horarios' => HorarioResource::collection($this->whenLoaded('horarios')),
            'matriculas' => MatriculaResource::collection($this->whenLoaded('matriculas')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
