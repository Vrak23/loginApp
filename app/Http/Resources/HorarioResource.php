<?php

namespace App\Http\Resources;

use App\Http\Resources\Concerns\PreservesNullResourceData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HorarioResource extends JsonResource
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
            'id_horario' => $this->id_horario,
            'id_curso' => $this->id_curso,
            'dia_semana' => $this->dia_semana,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'id_aula' => $this->id_aula,
            'curso' => CursoResource::make($this->whenLoaded('curso')),
            'matriculas' => MatriculaResource::collection($this->whenLoaded('matriculas')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
