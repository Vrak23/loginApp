<?php

namespace App\Http\Controllers\Api;

use App\Models\Horario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $horarios = Horario::with(['curso', 'matriculas'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Listado de horarios obtenido correctamente.',
            'data' => $horarios,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id_curso' => ['required', 'exists:cursos,id_curso'],
            'dia_semana' => ['required', 'string', 'max:255'],
            'hora_inicio' => ['required', 'date_format:H:i'],
            'hora_fin' => ['required', 'date_format:H:i', 'after:hora_inicio'],
            'id_aula' => ['required', 'string', 'max:255'],
        ]);

        $horario = Horario::create($validated)->load(['curso', 'matriculas']);

        return response()->json([
            'success' => true,
            'message' => 'Horario creado correctamente.',
            'data' => $horario,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $horario = Horario::with(['curso', 'matriculas'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Horario obtenido correctamente.',
            'data' => $horario,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $horario = Horario::findOrFail($id);

        $validated = $request->validate([
            'id_curso' => ['sometimes', 'required', 'exists:cursos,id_curso'],
            'dia_semana' => ['sometimes', 'required', 'string', 'max:255'],
            'hora_inicio' => ['sometimes', 'required', 'date_format:H:i'],
            'hora_fin' => ['sometimes', 'required', 'date_format:H:i', 'after:hora_inicio'],
            'id_aula' => ['sometimes', 'required', 'string', 'max:255'],
        ]);

        $horario->update($validated);
        $horario->load(['curso', 'matriculas']);

        return response()->json([
            'success' => true,
            'message' => 'Horario actualizado correctamente.',
            'data' => $horario,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return response()->json([
            'success' => true,
            'message' => 'Horario eliminado correctamente.',
            'data' => null,
        ]);
    }
}
