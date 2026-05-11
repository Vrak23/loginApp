<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    /**
     * Display a listing of alumnos.
     */
    public function index(): View
    {
        $alumnos = Alumno::orderBy('apellidos')
            ->orderBy('nombre')
            ->get();

        return view('alumnos.index', compact('alumnos'));
    }
}
