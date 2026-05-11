<?php

namespace App\Http\Controllers\Api;

use App\Models\Matricula;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $matriculas = Matricula::with(['alumno', 'curso', 'profesor', 'horario'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Listado de matriculas obtenido correctamente.',
            'data' => $matriculas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
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

        return response()->json([
            'success' => true,
            'message' => 'Matricula creada correctamente.',
            'data' => $matricula,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $matricula = Matricula::with(['alumno', 'curso', 'profesor', 'horario'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Matricula obtenida correctamente.',
            'data' => $matricula,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
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

        return response()->json([
            'success' => true,
            'message' => 'Matricula actualizada correctamente.',
            'data' => $matricula,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();

        return response()->json([
            'success' => true,
            'message' => 'Matricula eliminada correctamente.',
            'data' => null,
        ]);
    }
}
