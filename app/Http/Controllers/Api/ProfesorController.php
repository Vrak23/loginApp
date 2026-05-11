<?php

namespace App\Http\Controllers\Api;

use App\Models\Profesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $profesores = Profesor::with('matriculas')->get();

        return response()->json([
            'success' => true,
            'message' => 'Listado de profesores obtenido correctamente.',
            'data' => $profesores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'especialidad' => ['required', 'string', 'max:255'],
        ]);

        $profesor = Profesor::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profesor creado correctamente.',
            'data' => $profesor,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $profesor = Profesor::with('matriculas')->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Profesor obtenido correctamente.',
            'data' => $profesor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $profesor = Profesor::findOrFail($id);

        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'apellidos' => ['sometimes', 'required', 'string', 'max:255'],
            'especialidad' => ['sometimes', 'required', 'string', 'max:255'],
        ]);

        $profesor->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profesor actualizado correctamente.',
            'data' => $profesor,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Profesor eliminado correctamente.',
            'data' => null,
        ]);
    }
}
