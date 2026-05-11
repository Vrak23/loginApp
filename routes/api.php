<?php

use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\ProfesorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.basic')->get('/usuario', function (Request $request) {
    return response()->json([
        'mensaje' => 'Acceso permitido',
        'usuario' => $request->user()
    ]);
});

Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('cursos', CursoController::class);
Route::apiResource('profesores', ProfesorController::class);
Route::apiResource('horarios', HorarioController::class);
Route::apiResource('matriculas', MatriculaController::class);
