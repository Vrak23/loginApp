<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HorarioResource;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with(['curso', 'matriculas'])->get();

        return HorarioResource::collection($horarios)->additional([
            'success' => true,
            'message' => 'Listado de horarios obtenido correctamente.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_curso' => ['required', 'exists:cursos,id_curso'],
            'dia_semana' => ['required', 'string', 'max:255'],
            'hora_inicio' => ['required', 'date_format:H:i'],
            'hora_fin' => ['required', 'date_format:H:i', 'after:hora_inicio'],
            'id_aula' => ['required', 'string', 'max:255'],
        ]);

        $horario = Horario::create($validated)->load(['curso', 'matriculas']);

        return (new HorarioResource($horario))->additional([
            'success' => true,
            'message' => 'Horario creado correctamente.',
        ])->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $horario = Horario::with(['curso', 'matriculas'])->findOrFail($id);

        return (new HorarioResource($horario))->additional([
            'success' => true,
            'message' => 'Horario obtenido correctamente.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        return (new HorarioResource($horario))->additional([
            'success' => true,
            'message' => 'Horario actualizado correctamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return (new HorarioResource(null))->additional([
            'success' => true,
            'message' => 'Horario eliminado correctamente.',
        ]);
    }
}
