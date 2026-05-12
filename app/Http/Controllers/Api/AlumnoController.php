<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlumnoResource;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::with('matriculas')->get();

        return AlumnoResource::collection($alumnos)->additional([
            'success' => true,
            'message' => 'Listado de alumnos obtenido correctamente.',
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
            'fecha_nacimiento' => ['required', 'date'],
            'dni' => ['required', 'string', 'max:255', 'unique:alumnos,dni'],
            'direccion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:alumnos,email'],
            'estado_matricula' => ['sometimes', 'in:matriculado,inactivo'],
        ]);

        $alumno = Alumno::create($validated);

        return (new AlumnoResource($alumno))->additional([
            'success' => true,
            'message' => 'Alumno creado correctamente.',
        ])->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Alumno::with('matriculas')->findOrFail($id);

        return (new AlumnoResource($alumno))->additional([
            'success' => true,
            'message' => 'Alumno obtenido correctamente.',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alumno = Alumno::findOrFail($id);

        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'apellidos' => ['sometimes', 'required', 'string', 'max:255'],
            'fecha_nacimiento' => ['sometimes', 'required', 'date'],
            'dni' => ['sometimes', 'required', 'string', 'max:255', 'unique:alumnos,dni,' . $alumno->id_alumno . ',id_alumno'],
            'direccion' => ['sometimes', 'required', 'string', 'max:255'],
            'telefono' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:255', 'unique:alumnos,email,' . $alumno->id_alumno . ',id_alumno'],
            'estado_matricula' => ['sometimes', 'required', 'in:matriculado,inactivo'],
        ]);

        $alumno->update($validated);

        return (new AlumnoResource($alumno))->additional([
            'success' => true,
            'message' => 'Alumno actualizado correctamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return (new AlumnoResource(null))->additional([
            'success' => true,
            'message' => 'Alumno eliminado correctamente.',
        ]);
    }
}
