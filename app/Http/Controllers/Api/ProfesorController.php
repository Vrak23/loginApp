<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfesorResource;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::with('matriculas')->get();

        return ProfesorResource::collection($profesores)->additional([
            'success' => true,
            'message' => 'Listado de profesores obtenido correctamente.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'especialidad' => ['required', 'string', 'max:255'],
        ]);

        $profesor = Profesor::create($validated);

        return (new ProfesorResource($profesor))->additional([
            'success' => true,
            'message' => 'Profesor creado correctamente.',
        ])->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profesor = Profesor::with('matriculas')->findOrFail($id);

        return (new ProfesorResource($profesor))->additional([
            'success' => true,
            'message' => 'Profesor obtenido correctamente.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profesor = Profesor::findOrFail($id);

        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'apellidos' => ['sometimes', 'required', 'string', 'max:255'],
            'especialidad' => ['sometimes', 'required', 'string', 'max:255'],
        ]);

        $profesor->update($validated);

        return (new ProfesorResource($profesor))->additional([
            'success' => true,
            'message' => 'Profesor actualizado correctamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();

        return (new ProfesorResource(null))->additional([
            'success' => true,
            'message' => 'Profesor eliminado correctamente.',
        ]);
    }
}
