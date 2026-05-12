<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CursoResource;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::with(['horarios', 'matriculas'])->get();

        return CursoResource::collection($cursos)->additional([
            'success' => true,
            'message' => 'Listado de cursos obtenido correctamente.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_curso' => ['required', 'string', 'max:255'],
            'codigo_curso' => ['required', 'string', 'max:255', 'unique:cursos,codigo_curso'],
            'creditos' => ['required', 'integer', 'min:1'],
            'descripcion' => ['nullable', 'string'],
        ]);

        $curso = Curso::create($validated);

        return (new CursoResource($curso))->additional([
            'success' => true,
            'message' => 'Curso creado correctamente.',
        ])->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::with(['horarios', 'matriculas'])->findOrFail($id);

        return (new CursoResource($curso))->additional([
            'success' => true,
            'message' => 'Curso obtenido correctamente.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);

        $validated = $request->validate([
            'nombre_curso' => ['sometimes', 'required', 'string', 'max:255'],
            'codigo_curso' => ['sometimes', 'required', 'string', 'max:255', 'unique:cursos,codigo_curso,' . $curso->id_curso . ',id_curso'],
            'creditos' => ['sometimes', 'required', 'integer', 'min:1'],
            'descripcion' => ['nullable', 'string'],
        ]);

        $curso->update($validated);

        return (new CursoResource($curso))->additional([
            'success' => true,
            'message' => 'Curso actualizado correctamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return (new CursoResource(null))->additional([
            'success' => true,
            'message' => 'Curso eliminado correctamente.',
        ]);
    }
}
