<?php

namespace App\Http\Resources;

use App\Http\Resources\Concerns\PreservesNullResourceData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumnoResource extends JsonResource
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
            'id_alumno' => $this->id_alumno,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'dni' => $this->dni,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'estado_matricula' => $this->estado_matricula,
            'matriculas' => MatriculaResource::collection($this->whenLoaded('matriculas')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
