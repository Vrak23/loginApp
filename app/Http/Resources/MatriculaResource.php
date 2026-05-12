<?php

namespace App\Http\Resources;

use App\Http\Resources\Concerns\PreservesNullResourceData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatriculaResource extends JsonResource
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
            'id_matricula' => $this->id_matricula,
            'id_alumno' => $this->id_alumno,
            'id_curso' => $this->id_curso,
            'id_profesor' => $this->id_profesor,
            'id_horario' => $this->id_horario,
            'semestre' => $this->semestre,
            'fecha_matricula' => $this->fecha_matricula,
            'nota_final' => $this->nota_final,
            'estado' => $this->estado,
            'alumno' => AlumnoResource::make($this->whenLoaded('alumno')),
            'curso' => CursoResource::make($this->whenLoaded('curso')),
            'profesor' => ProfesorResource::make($this->whenLoaded('profesor')),
            'horario' => HorarioResource::make($this->whenLoaded('horario')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
