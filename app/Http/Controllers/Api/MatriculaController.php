<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatriculaResource;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::with(['alumno', 'curso', 'profesor', 'horario'])->get();

        return MatriculaResource::collection($matriculas)->additional([
            'success' => true,
            'message' => 'Listado de matriculas obtenido correctamente.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_alumno' => ['required', 'exists:alumnos,id_alumno'],
            'id_curso' => ['required', 'exists:cursos,id_curso'],
            'id_profesor' => ['nullable', 'exists:profesores,id_profesor'],
            'id_horario' => ['nullable', 'exists:horarios,id_horario'],
            'semestre' => ['required', 'string', 'max:255'],
            'fecha_matricula' => ['required', 'date'],
            'nota_final' => ['nullable', 'numeric', 'between:0,999.99'],
            'estado' => ['sometimes', 'in:aprobado,reprobado,cursando'],
        ]);

        $matricula = Matricula::create($validated)->load(['alumno', 'curso', 'profesor', 'horario']);

        return (new MatriculaResource($matricula))->additional([
            'success' => true,
            'message' => 'Matricula creada correctamente.',
        ])->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matricula = Matricula::with(['alumno', 'curso', 'profesor', 'horario'])->findOrFail($id);

        return (new MatriculaResource($matricula))->additional([
            'success' => true,
            'message' => 'Matricula obtenida correctamente.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matricula = Matricula::findOrFail($id);

        $validated = $request->validate([
            'id_alumno' => ['sometimes', 'required', 'exists:alumnos,id_alumno'],
            'id_curso' => ['sometimes', 'required', 'exists:cursos,id_curso'],
            'id_profesor' => ['nullable', 'exists:profesores,id_profesor'],
            'id_horario' => ['nullable', 'exists:horarios,id_horario'],
            'semestre' => ['sometimes', 'required', 'string', 'max:255'],
            'fecha_matricula' => ['sometimes', 'required', 'date'],
            'nota_final' => ['nullable', 'numeric', 'between:0,999.99'],
            'estado' => ['sometimes', 'required', 'in:aprobado,reprobado,cursando'],
        ]);

        $matricula->update($validated);
        $matricula->load(['alumno', 'curso', 'profesor', 'horario']);

        return (new MatriculaResource($matricula))->additional([
            'success' => true,
            'message' => 'Matricula actualizada correctamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return (new MatriculaResource(null))->additional([
            'success' => true,
            'message' => 'Matricula eliminada correctamente.',
        ]);
    }
}
