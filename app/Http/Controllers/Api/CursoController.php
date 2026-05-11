<?php

namespace App\Http\Controllers\Api;

use App\Models\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $cursos = Curso::with(['horarios', 'matriculas'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Listado de cursos obtenido correctamente.',
            'data' => $cursos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre_curso' => ['required', 'string', 'max:255'],
            'codigo_curso' => ['required', 'string', 'max:255', 'unique:cursos,codigo_curso'],
            'creditos' => ['required', 'integer', 'min:1'],
            'descripcion' => ['nullable', 'string'],
        ]);

        $curso = Curso::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Curso creado correctamente.',
            'data' => $curso,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $curso = Curso::with(['horarios', 'matriculas'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Curso obtenido correctamente.',
            'data' => $curso,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $curso = Curso::findOrFail($id);

        $validated = $request->validate([
            'nombre_curso' => ['sometimes', 'required', 'string', 'max:255'],
            'codigo_curso' => ['sometimes', 'required', 'string', 'max:255', 'unique:cursos,codigo_curso,' . $curso->id_curso . ',id_curso'],
            'creditos' => ['sometimes', 'required', 'integer', 'min:1'],
            'descripcion' => ['nullable', 'string'],
        ]);

        $curso->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Curso actualizado correctamente.',
            'data' => $curso,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return response()->json([
            'success' => true,
            'message' => 'Curso eliminado correctamente.',
            'data' => null,
        ]);
    }
}
