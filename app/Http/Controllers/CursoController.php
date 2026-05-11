<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\View\View;

class CursoController extends Controller
{
    /**
     * Display a listing of cursos.
     */
    public function index(): View
    {
        $cursos = Curso::orderBy('nombre_curso')->get();

        return view('cursos.index', compact('cursos'));
    }
}
